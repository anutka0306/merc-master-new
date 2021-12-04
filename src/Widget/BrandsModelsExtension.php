<?php

namespace App\Widget;

use App\Entity\Content;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Repository\PriceBrandRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\PriceCategoryRepository;
use App\Repository\PriceServiceRepository;
use App\Repository\ContentRepository;

class BrandsModelsExtension extends AbstractExtension
{
    /**
     * @var ContentRepository
     */
    protected $content_repository;

    /**
     * @var PriceBrandRepository
     */
    protected $brand_repository;
    /**
     * @var AdapterInterface
     */
    protected $cache;

    /**
     * @var PriceCategoryRepository
     */
    protected $service_repository;

    /**
     * @var PriceServiceRepository
     */
    protected $price_service_repository;

    public function __construct(PriceBrandRepository $brand_repository, AdapterInterface $cache, PriceCategoryRepository $service_repository, PriceServiceRepository $price_service_repository, ContentRepository $content_repository)
    {
        $this->content_repository = $content_repository;
        $this->brand_repository = $brand_repository;
        $this->cache = $cache;
        $this->service_repository = $service_repository;
        $this->price_service_repository = $price_service_repository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('brands_block', [$this, 'brands_block'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_service_block', [$this, 'brands_service_block'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_sedan_hatchback', [$this, 'brands_models_sedan_hatchback'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_crossover', [$this, 'brands_models_crossover'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_suv', [$this, 'brands_models_suv'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_popular', [$this, 'brands_models_popular'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_sedan_hatchback', [$this, 'models_sedan_hatchback'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_crossover', [$this, 'models_crossover'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_suv', [$this, 'models_suv'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_van', [$this, 'models_van'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_popular', [$this, 'models_popular'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brand_models', [$this, 'brand_models'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brand_models_service', [$this, 'brand_models_service'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function brands_block(Environment $twig): string
    {
        $item = $this->cache->getItem('brands_block');
        if (!$item->isHit()) {//если данное значение не закешировано
            $items = $this->brand_repository->findBy([], ['name' => 'asc']);
            $html = $twig->render('v2/widget/brands.html.twig', compact('items'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_service_block(Environment $twig, $service = null): string
    {
            $item = $this->cache->getItem('brands_block');
        
            if(!$service) {
                $items = $this->brand_repository->findAllWithPath();
                $services = $this->service_repository->findAll();
            }else{
                $items = $this->brand_repository->findAllWithPath($service);
                foreach ($items as $key => $value){
                    //Убрать приставку euro из некоторых брендов
                        $code = trim(str_replace('-euro','',$value['code']));

                    $serviceUrl = $this->content_repository->findOneBy(['path'=>$service.$code.'/']);

                        $items[$key]['service_url'] = $serviceUrl;
                }
                $services = $this->price_service_repository->findBy(['slug' => $service]);
            }
            $html = $twig->render('v2/widget/brands.html.twig', compact('items', 'services'));
            $item->set($html);

        return $item->get();
    }

    public function brands_models_sedan_hatchback(Environment $twig): string
    {
        $item = $this->cache->getItem('brands_models_sedan_hatchback');
        if (!$item->isHit()) {//если данное значение не закешировано
        $brands = $this->getBrandsWithFilteredModels([
            PriceModel::TYPE_SEDAN,
            PriceModel::TYPE_HATCHBACK,
        ]);

        $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_crossover(Environment $twig): string
    {
        $item = $this->cache->getItem('brands_models_crossover');
        if (!$item->isHit()) {//если данное значение не закешировано
        $brands = $this->getBrandsWithFilteredModels([
            PriceModel::TYPE_CROSSOVER,
        ]);

        $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_suv(Environment $twig): string
    {
        $item = $this->cache->getItem('brands_models_suv');
        if (!$item->isHit()) {//если данное значение не закешировано
        $brands = $this->getBrandsWithFilteredModels([
            PriceModel::TYPE_SUV,
        ]);

        $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_popular(Environment $twig): string
    {
        $item = $this->cache->getItem('brands_models_popular');
        if (!$item->isHit()) {//если данное значение не закешировано
        $brands = $this->brand_repository->findAllWithModels();

        foreach ($brands as $brand) {
            $brand->filterPriceModelsByPopular();
        }

        $brands = array_filter($brands, static function (PriceBrand $brand) {
            return count($brand->getPriceModels()) > 0;
        });

        $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_sedan_hatchback(Environment $twig, PriceBrand $brand): string
    {
        $item = $this->cache->getItem('models_sedan_hatchback' . $brand->getName());
        if (!$item->isHit()) {//если данное значение не закешировано
        $models = $brand->filterPriceModelsByTypes([
            PriceModel::TYPE_SEDAN,
            PriceModel::TYPE_HATCHBACK,
        ], false);
        $html = $twig->render('v2/widget/models.html.twig', compact('models'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_crossover(Environment $twig, PriceBrand $brand): string
    {
        $item = $this->cache->getItem('models_crossover' . $brand->getName());
        if (!$item->isHit()) {//если данное значение не закешировано
        $models = clone $brand->filterPriceModelsByTypes([
            PriceModel::TYPE_CROSSOVER,
        ], false);
        $html = $twig->render('v2/widget/models.html.twig', compact('models'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_suv(Environment $twig, PriceBrand $brand): string
    {
        $item = $this->cache->getItem('models_suv' . $brand->getName());
        if (!$item->isHit()) {//если данное значение не закешировано
        $models = $brand->filterPriceModelsByTypes([
            PriceModel::TYPE_SUV,
        ], false);
        $html = $twig->render('v2/widget/models.html.twig', compact('models'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_van(Environment $twig, PriceBrand $brand): string
    {
        $item = $this->cache->getItem('models_van' . $brand->getName());
        if (!$item->isHit()) {//если данное значение не закешировано
        $models = $brand->filterPriceModelsByTypes([
            PriceModel::TYPE_VAN,
        ], false);
        $html = $twig->render('v2/widget/models.html.twig', compact('models'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_popular(Environment $twig, PriceBrand $brand): string
    {
        $item = $this->cache->getItem('models_popular' . $brand->getName());
        if (!$item->isHit()) {//если данное значение не закешировано
        $models = $brand->filterPriceModelsByPopular(false);
        $html = $twig->render('v2/widget/models.html.twig', compact('models'));
        $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    private function getBrandsWithFilteredModels(array $types): array
    {
        $brands = $this->brand_repository->findAllWithModels();

        foreach ($brands as $brand) {
            $brand->filterPriceModelsByTypes($types);
        }

        return array_filter($brands, static function (PriceBrand $brand) {
            return count($brand->getPriceModels()) > 0;
        });
    }

    //Все модели бренда
    public function brand_models(Environment $twig, PriceBrand $brand, $path): string {
        $item = $this->cache->getItem('brand_models' . $brand->getName());
        $models = $brand->getPriceModels();
        foreach ($models as $key => $model){
            $page = $this->content_repository->findOneBy(['path' => $path.$model->getCode().'/']);
            if($page){
                $model->path = $page->getPath();
            }else{
                $model->path = null;
            }
        }


        $curBrand = $this->brand_repository->findOneWithPath($brand->getId());
        $html = $twig->render('v2/widget/models.html.twig', compact('models', 'curBrand'));
        $item->set($html);
        return $item->get();
    }

    // Все модели бренда на стр. сервиса

    public  function brand_models_service(Environment $twig, PriceBrand $brand){
        $item = $this->cache->getItem('brand_models' . $brand->getName());
        $models = $brand->getPriceModels();
        $curBrand = $this->brand_repository->findOneWithPath($brand->getId());
        $itemsCount = floor(count($models)/6);
        if($itemsCount == 0){
            $itemsCount = 1;
        }
        foreach ($models as $key => $model){
            $page = $this->content_repository->findOneBy(['path' => '/'.$model->getCode().'/', 'published'=> 1]);
            if($page){
                $model->path = $page->getPath();
            }else{
                /*$model->path = $curBrand[0]['path'].$model->getCode();*/
                $model->path = null;
            }
        }

        $html = $twig->render('v2/widget/models_alternative.html.twig', compact('models', 'curBrand','itemsCount'));
        $item->set($html);
        return $item->get();
    }
}
