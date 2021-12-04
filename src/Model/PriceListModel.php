<?php

namespace App\Model;

use App\Entity\Brand;
use App\Entity\Content;
use App\Repository\ContentRepository;
use App\Repository\BrandRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceModelRepository;
use App\Entity\Model;
use App\Entity\PriceCategory;
use App\Entity\RootService;
use App\Entity\ServiceEntityReedInterface;
use App\Entity\Simple;
use App\Repository\PriceCategoryRepository;
use App\Repository\PriceServiceRepository;
use App\Repository\RootServiceRepository;
use App\Service\ConfigService;

class PriceListModel
{
    public const BASE_PRICE_HOUR = 1600;
    
    /**
     * @var PriceServiceRepository
     */
    protected $price_service_repository;
    /**
     * @var PriceCategoryRepository
     */
    protected $price_category_repository;
    /**
     * @var ConfigService
     */
    protected $configs;
    
    private $service_name;
    
    private $brand_model;
    /**
     * @var RootServiceRepository
     */
    private $rootServiceRepository;

    /**
     * @var ContentRepository
     */
    private $contentRepository;


    /**
     * @var PriceBrandRepository
     */
    private $priceBrandRepository;

    /**
     * @var PriceModelRepository
     */
    private $priceModelRepository;

    public function __construct(
        PriceServiceRepository $price_service_repository,
        PriceCategoryRepository $price_category_repository,
        RootServiceRepository $rootServiceRepository,
        ConfigService $configs,
        ContentRepository $contentRepository,
        PriceBrandRepository $priceBrandRepository,
        PriceModelRepository $priceModelRepository
    ) {
        
        $this->price_service_repository  = $price_service_repository;
        $this->price_category_repository = $price_category_repository;
        $this->configs                   = $configs;
        $this->rootServiceRepository = $rootServiceRepository;
        $this->contentRepository = $contentRepository;
        $this->priceBrandRepository = $priceBrandRepository;
        $this->priceModelRepository = $priceModelRepository;
    }
    
    /**
     * @param Content $content
     *
     * @return PriceCategory[]|null
     */
    public function getSectionsByPage(Content $content)
    {

        $this->brand_model = $content->getBrandAndModelName();

        if ($content instanceof Brand || $content instanceof Model || $content instanceof Simple) {

            //$default_category = $this->configs->getCached('price.default_category');
            $sections_ids = array();
            $default_category = $this->price_category_repository->findAll();
            foreach ($default_category as $item){
                $sections_ids[] = $item->getId();
            }


            //$sections_ids = explode(',',$default_category);

            $sections = [];

            if (empty($sections_ids)){
                return null;
            }

            foreach ($sections_ids as $index => $section_id) {
                $section = $this->price_category_repository->find($section_id);
                if (0 === $index) {
                    $this->service_name = $section->getName();
                }
                if ($content instanceof Simple) {
                    $this->prepareSectionForRootServices($section);
                }else{
                    $this->prepareSection($section,$content);
                }
                $this->prepareSection($section,$content);
                $sections[] = $section;
            }

            return $sections;
            
        }
        elseif ($content instanceof ServiceEntityReedInterface){

            $section = $content->getPriceCategory();

            $service = $content->getService();

            if ( ! $section && ! $service) {
                return null;
            }
            $this->service_name = $service ? $service->getName():$section->getName();
            //return $this->service_name;

            $section->setServiceAtFirstPosition($service);
            if ($content instanceof RootService) {
                $this->prepareSectionForRootServices($section);
            }else{
                $this->prepareSection($section,$content);
            }

            return [$section];
        }else{

            return null;
        }
    }
    
    public function getPriceListTitle()
    {
        return $this->service_name . ' ' . $this->brand_model;
    }
    
    
    public function getAllSections()
    {
        $sections = $this->price_category_repository->findBy(['parent' => null]);
        foreach ($sections as $section) {
            $this->prepareSectionForRootServices($section);
        }
        return $sections;
    }
    
    private function prepareSection(PriceCategory $section,Content $content)
    {

        $section->fillChildrenServices();
        $section->setPriceForServices($content, $this->priceModelRepository);
        $section->setPathForServices($content, $this->rootServiceRepository, $this->contentRepository, $this->priceBrandRepository, $this->priceModelRepository);
    }

    /**
     * @param PriceCategory $section
     */
    private function prepareSectionForRootServices(PriceCategory $section): void
    {
        $section->fillChildrenServices();
        $section->setPathForRootServices($this->rootServiceRepository);
    }

}