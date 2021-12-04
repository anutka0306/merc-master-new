<?php

namespace App\Service;

use App\Entity\Brand;
use App\Entity\Content;
use App\Entity\Model;
use App\Entity\PriceBrand;
use App\Entity\PriceCategory;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\RootService;
use App\Entity\Service;
use App\Model\PageGeneratorModel;
use App\Repository\BrandRepository;
use App\Repository\ContentRepository;
use App\Repository\ModelRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceModelRepository;
use App\Repository\PriceServiceRepository;
use App\Repository\ServiceRepository;
use App\Repository\RootServiceRepository;
use App\Repository\PriceCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpProgrammist\FileSqlLoggerBundle\FileSqlLogger;
use Psr\Log\LoggerInterface;

class PageGeneratorService
{
    /**
     * @var PriceCategoryRepository
     */
    protected $priceCategoryRepository;
    /**
     * @var RootServiceRepository
     */
    protected $rootServiceRepository;
    /**
     * @var BrandRepository
     */
    protected $brand_repository;
    /**
     * @var ModelRepository
     */
    protected $model_repository;
    /**
     * @var ServiceRepository
     */
    protected $service_repository;
    /**
     * @var ContentRepository
     */
    protected $content_repository;
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var PriceServiceRepository
     */
    protected $price_service_repository;
    /**
     * @var TranslateService
     */
    protected $translate_service;
    /**
     * @var PriceBrandRepository
     */
    protected $price_brand_repository;
    /**
     * @var PriceModelRepository
     */
    protected $price_model_repository;
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var array
     */
    private $seo;
    
    public function __construct(
        RootServiceRepository  $rootServiceRepository,
        BrandRepository $brand_repository,
        ModelRepository $model_repository,
        ContentRepository $content_repository,
        ServiceRepository $service_repository,
        PriceServiceRepository $price_service_repository,
        PriceBrandRepository $price_brand_repository,
        PriceModelRepository $price_model_repository,
        PriceCategoryRepository $priceCategoryRepository,
        ConfigService $config_service,
        TranslateService $translate_service,
        EntityManagerInterface $em,
        LoggerInterface $logger,
        FileSqlLogger $sql_logger
    ) {
        $this->rootServiceRepository    = $rootServiceRepository;
        $this->brand_repository         = $brand_repository;
        $this->model_repository         = $model_repository;
        $this->service_repository       = $service_repository;
        $this->priceCategoryRepository = $priceCategoryRepository;
        $this->seo                      = $config_service->getGroup('seo');
        $this->content_repository       = $content_repository;
        $this->em                       = $em;
        $this->price_service_repository = $price_service_repository;
        $this->translate_service        = $translate_service;
        $this->price_brand_repository   = $price_brand_repository;
        $this->price_model_repository   = $price_model_repository;
        $this->logger                   = $logger;
    
        $connection = $this->em->getConnection();
        $connection->getConfiguration()->setSQLLogger($sql_logger);
    }
    
    public function generateByNewBrand(PriceBrand $price_brand)
    {
        $brand_page     = $this->addRootBrandPage($price_brand);
        $price_services = $this->price_service_repository->findAll();
        $price_category = $this->priceCategoryRepository->findAll();
        foreach ($price_category as $category){
            $this->addCategoryServicePage(
                $category,
                $brand_page,
                $price_brand->getBrandModelWithTranslation(),
                $price_brand->getName()
            );
        }
        foreach ($price_services as $price_service) {
            //echo $price_service->getName().' - '. $this->translate_service->transliterate($price_service->getName()).PHP_EOL;
            $this->addServicePage(
                $price_service,
                $brand_page,
                $price_brand->getBrandModelWithTranslation(),
                $price_brand->getName()
            );
        }

        $this->em->flush();
    }
    
    public function generateByNewModel(PriceModel $price_model)
    {
        $price_brand = $price_model->getPriceBrand();
        
        $brand_page = $this->brand_repository->findOneBy(['priceBrand' => $price_brand]);
        if (null === $brand_page) {
            $brand_page = $this->addRootBrandPage($price_brand);
        }
        $model_page     = $this->addRootModelPage($price_model, $price_brand, $brand_page);
        $price_category = $this->priceCategoryRepository->findAll();
        $model_id =  $price_model->getId();

        foreach ($price_category as $category){
            $this->addCategoryServicePageModel(
                $category,
                $model_page,
                $price_model->getBrandModelWithTranslation(),
                $price_brand->getName(),
                $model_id
            );
        }
        $price_services = $this->price_service_repository->findAll();
        foreach ($price_services as $price_service) {
            $this->addServicePageModel(
                $price_service,
                $model_page,
                $price_model->getBrandModelWithTranslation(),
                $price_brand->getName(),
                $model_id
            );
            
        }
        $this->em->flush();
    }

    public function removeByModel(PriceModel $price_model){
        $modelId = $price_model->getId();
        $modelPage = $this->content_repository->findOneBy(['model_id' => $modelId])->getId();
        $servicesPages = $this->content_repository->findBy(['parent' => $modelPage]);

        foreach ($servicesPages as $serv){
            $query = $this->em->createQueryBuilder();
            $query->delete(Content::class, 'c')->where('c.id = :services')->setParameter('services', $serv)->getQuery()->execute();
        }
        $query = $this->em->createQueryBuilder();
        $query->delete(Content::class, 'c')->where('c.id = ?1')->setParameter(1, $modelPage)->getQuery()->execute();

    }


    public function generateByNewCategory(PriceCategory $priceCategory){
        $this->addRootServicePageByCategory(
            $priceCategory
        );
        $price_brands = $this->price_brand_repository->findAll();

        foreach ($price_brands as $price_brand) {
            $brand_page = $this->brand_repository->findOneBy(['priceBrand' => $price_brand]);
            if (null === $brand_page) {
                $brand_page = $this->addRootBrandPage($price_brand);
            }
            $servicePage = new Service();
            $servicePage->setName($priceCategory->getName() .' '. $price_brand->getName())
                ->setText('')
                ->setBrandId($price_brand->getId())
                ->setPath($price_brand->getPath().$priceCategory->getSlug().'/')
                ->setParent($this->content_repository->findOneBy(['brand_id' => $price_brand->getId(), 'path' => $price_brand->getPath()]))
                ->setPriceCategory($priceCategory)
            ;
            $this->em->persist($servicePage);

            foreach ($price_brand->getPriceModels() as $price_model) {
                $model_page = $this->model_repository->findOneBy(['priceModel' => $price_model]);
                if (null === $model_page) {
                    $model_page = $this->addRootModelPage($price_model, $price_brand, $brand_page);
                }
                $servicePage = new Service();
                $servicePage->setName($priceCategory->getName(). ' '. $price_brand->getName(). ' '. $price_model->getName())
                    ->setText('')
                    ->setModelId($price_model->getId())
                    ->setPath($price_model->getPath().$priceCategory->getSlug().'/')
                    ->setParent($this->content_repository->findOneBy(['model_id' => $price_model->getId(), 'path' => $price_model->getPath()]))
                    ->setPriceCategory($priceCategory)
                ;
                $this->em->persist($servicePage);
            }

        }
        $this->em->flush();

    }
    
    public function generateByNewService(PriceService $price_service)
    {

        $this->addRootServicePage(
            $price_service
        );
        $price_brands = $this->price_brand_repository->findAll();
        
        foreach ($price_brands as $price_brand) {
            $brand_page = $this->brand_repository->findOneBy(['priceBrand' => $price_brand]);
            if (null === $brand_page) {
                $brand_page = $this->addRootBrandPage($price_brand);
            }
            $this->addServicePage(
                $price_service,
                $brand_page,
                $price_brand->getBrandModelWithTranslation(),
                $price_brand->getName()
            );
            foreach ($price_brand->getPriceModels() as $price_model) {
                $model_page = $this->model_repository->findOneBy(['priceModel' => $price_model]);
                if (null === $model_page) {
                    $model_page = $this->addRootModelPage($price_model, $price_brand, $brand_page);
                }
                $this->addServicePage(
                    $price_service,
                    $model_page,
                    $price_model->getBrandModelWithTranslation(),
                    $price_brand->getName()
                );
            }
        }
        $this->em->flush();
        
    }
    
    public function generateByPageGeneratorModel(PageGeneratorModel $page_generator_model):int
    {
        $pages = $page_generator_model->getMatchedPages();
        foreach ($pages as $page) {
            $service = $page->getService();
            $brand_model = $page->getBrandModelWithTranslation();
            $brand = $page->getPriceBrand()->getName();
            $h1 = $this->renderSeoTemplate($service,$brand_model,$brand,$page_generator_model->h1);
            $metaDescription = $this->renderSeoTemplate($service,$brand_model,$brand,$page_generator_model->metaDescription);
            $text = $this->renderSeoTemplate($service,$brand_model,$brand,$page_generator_model->text);
            $this->regeneratePath($page_generator_model, $page);
            $page->setH1($h1);
            $page->setMetaDescription($metaDescription);
            $page->setText($text);
            $page->setPublished(true);
        }
        $this->em->flush();
        return count($pages);
    }
    
    private function getSeo($type, $service, $brand_model, $brand)
    {
        $template = $this->seo[$type];
        
        return $this->renderSeoTemplate($service,$brand_model,$brand,$template);
    }
    
    private function renderSeoTemplate($service,$brand_model,$brand,$template)
    {
        return str_replace(['SERVICE', 'BRAND MODEL', 'BRAND'], [$service, $brand_model, $brand], $template);
    }

    private function addRootServicePage(
        PriceService $price_service
    ){
        $path = $price_service->getPriceCategory()->getSlug();
        $rootService_page = new RootService();
        $rootService_page->setName($price_service->getName())
            ->setPath('/'.$this->getRootServicePath($price_service))
            ->setService($price_service)
            ->setParent($this->content_repository->findOneBy(['path' => '/'.$path.'/']))
            ->setPriceCategory($price_service->getPriceCategory())
            ->setPublished(true);
        $this->em->persist($rootService_page);
    }

    private function addRootServicePageByCategory(
        PriceCategory $priceCategory
    ){
        $path = $priceCategory->getSlug();
        $rootCategory_page = new RootService();
        $rootCategory_page->setName($priceCategory->getName())
            ->setPath('/'.$path.'/')
            ->setService(null)
            ->setParent($this->content_repository->findOneBy(['path' => '/']))
            ->setPriceCategory($priceCategory)
            ->setPublished(true);
        $this->em->persist($rootCategory_page);
    }
    
    private function addServicePage(
        PriceService $price_service,
        Content $parent,
        $brand_model_with_translation,
        $brand_name
    ) {
        $service_page = new Service();
        $service_page->setName($price_service->getName())
                     ->setPath($this->getNewServicePath($parent,$price_service))
                     ->setParent($parent)
                    ->setModelId($parent->getModelId());
        $service_page->setService($price_service)
                     ->setPriceCategory($price_service->getPriceCategory())
                     ->setH1($this->getSeo('h1', $price_service->getName(),
                         $brand_model_with_translation, $brand_name))
                     ->setMetaDescription($this->getSeo('description', $price_service->getName(),
                         $brand_model_with_translation,
                         $brand_name))
                     ->setPublished(false);
        // $this->logger->info($service_page->getPath().' - '.$parent->getId());
        $this->em->persist($service_page);
    }

    private function addServicePageModel(
        PriceService $price_service,
        Content $parent,
        $brand_model_with_translation,
        $brand_name,
        $model_id
    ) {
        $service_page = new Service();
        $service_page->setName($price_service->getName())
            ->setPath($this->getNewServicePath($parent,$price_service))
            ->setParent($parent)
            ->setModelId($model_id);
        $service_page->setService($price_service)
            ->setPriceCategory($price_service->getPriceCategory())
            ->setH1($this->getSeo('h1', $price_service->getName(),
                $brand_model_with_translation, $brand_name))
            ->setMetaDescription($this->getSeo('description', $price_service->getName(),
                $brand_model_with_translation,
                $brand_name))
            ->setPublished(false);
        // $this->logger->info($service_page->getPath().' - '.$parent->getId());
        $this->em->persist($service_page);
    }

    private function addCategoryServicePage(
        PriceCategory $priceCategory,
        Content $parent,
        $brand_model_with_translation,
        $brand_name
    ) {
        $service_page = new Service();
        $service_page->setName($priceCategory->getName())
            ->setPath($parent->getAlias().$priceCategory->getSlug().'/')
            ->setParent($parent)
            ->setModelId($parent->getModelId());
        $service_page->setService(null)
            ->setPriceCategory($priceCategory)
            ->setH1($this->getSeo('h1', $priceCategory->getName(),
                $brand_model_with_translation, $brand_name))
            ->setMetaDescription($this->getSeo('description', $priceCategory->getName(),
                $brand_model_with_translation,
                $brand_name))
            ->setPublished(true);
        // $this->logger->info($service_page->getPath().' - '.$parent->getId());
        $this->em->persist($service_page);
    }

    private function addCategoryServicePageModel(
        PriceCategory $priceCategory,
        Content $parent,
        $brand_model_with_translation,
        $brand_name,
        $model_id
    ) {
        $service_page = new Service();
        $service_page->setName($priceCategory->getName())
            ->setPath($parent->getAlias().$priceCategory->getSlug().'/')
            ->setParent($parent)
            ->setModelId($model_id);
        $service_page->setService(null)
            ->setPriceCategory($priceCategory)
            ->setH1($this->getSeo('h1', $priceCategory->getName(),
                $brand_model_with_translation, $brand_name))
            ->setMetaDescription($this->getSeo('description', $priceCategory->getName(),
                $brand_model_with_translation,
                $brand_name))
            ->setPublished(true);
        // $this->logger->info($service_page->getPath().' - '.$parent->getId());
        $this->em->persist($service_page);
    }

    /**
     * @param PriceBrand $brand
     *
     * @return Brand
     */
    private function addRootBrandPage(PriceBrand $brand): Brand
    {
        $main_page  = $this->content_repository->find(1);
        $brand_page = new Brand();
        $brand_page->setName($brand->getBrandModelWithTranslation())
                   ->setPath(null)
                   ->setPriceBrand($brand)
                   ->setParent($main_page)
                   ->setH1($this->getSeo('h1', 'Кузовные работы', $brand->getBrandModelWithTranslation(),
                       $brand->getName()))
                   ->setMetaDescription($this->getSeo('description', 'Кузовные работы',
                       $brand->getBrandModelWithTranslation(),
                       $brand->getName()))
                   ->setPublished(true);
        $this->em->persist($brand_page);
        
        return $brand_page;
    }
    
    /**
     * @param PriceModel $price_model
     * @param PriceBrand $brand
     * @param Brand      $brand_page
     *
     * @return Model
     */
    private function addRootModelPage(PriceModel $price_model, PriceBrand $brand, Brand $brand_page): Model
    {
        $model_page = new Model();
        
        $model_page->setName($price_model->getBrandModelWithTranslation())
                   ->setPath($price_model->getPath())
                   ->setPriceModel($price_model)
                   ->setParent($brand_page)
                   ->setH1($this->getSeo('h1', 'Кузовные работы', $price_model->getBrandModelWithTranslation(),
                       $brand->getName()))
                   ->setMetaDescription($this->getSeo('description', 'Кузовные работы',
                       $price_model->getBrandModelWithTranslation(),
                       $brand->getName()))
                   ->setPublished(true);
        $this->em->persist($model_page);
        
        return $model_page;
    }

    private function getNewServicePath(Content $parent, PriceService $price_service, bool $isPlain = false):string
    {
        if ($isPlain) {
            return $parent->getPath() . $price_service->getSlug() . '/';
        }
        $parts = [];
        $parts[] = $price_service->getSlug();
        if ($price_service->getPriceCategory()) {
            $parts[] = $price_service->getPriceCategory()->getSlug();
            if ($price_service->getPriceCategory()->getParent()) {
                $parts[] = $price_service->getPriceCategory()->getParent()->getSlug();
            }
        }
        $parts = array_reverse(array_unique($parts));
        return $parent->getPath() . implode('/',$parts) . '/';
    }

    private function getRootServicePath(PriceService $price_service):string
    {

        $parts = [];
        $parts[] = $price_service->getSlug();
        if ($price_service->getPriceCategory()) {
            $parts[] = $price_service->getPriceCategory()->getSlug();
            if ($price_service->getPriceCategory()->getParent()) {
                $parts[] = $price_service->getPriceCategory()->getParent()->getSlug();
            }
        }
        $parts = array_reverse(array_unique($parts));
        return implode('/',$parts) . '/';
    }

    /**
     * @param PageGeneratorModel $page_generator_model
     * @param Service $page
     */
    private function regeneratePath(
        PageGeneratorModel $page_generator_model,
        Service $page
    ): void {
        if ($page_generator_model->urlRegenerate === PageGeneratorModel::URL_REGENERATE_ALL || ($page_generator_model->urlRegenerate === PageGeneratorModel::URL_REGENERATE_UNPUBLISHED && !$page->getPublished())) {
            $page->setPath($this->getNewServicePath($page->getParent(), $page->getService()));
        }
    }
}