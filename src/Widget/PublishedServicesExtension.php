<?php

namespace App\Widget;

use App\Entity\Content;
use App\Entity\Brand;
use App\Entity\PriceCategory;
use App\Entity\PriceService;
use App\Repository\ServiceRepository;
use App\Repository\RootServiceRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PublishedServicesExtension extends AbstractExtension
{

    /**
     * @var AdapterInterface
     */
    protected $cache;
    /**
     * @var RootServiceRepository
     */
    protected $rootServiceRepository;
    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    public function __construct(AdapterInterface $cache, RootServiceRepository $rootServiceRepository, ServiceRepository $serviceRepository)
    {
        $this->cache = $cache;
        $this->rootServiceRepository = $rootServiceRepository;
        $this->serviceRepository = $serviceRepository;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('common_service_cell', [$this, 'get_common_service_cell'], ['needs_environment'=> true, 'is_safe' => ['html']]),
            new TwigFunction('service_table_cell', [$this, 'get_service_table_cell'], ['needs_environment'=> true, 'is_safe' => ['html']]),
            new TwigFunction('service_table_rows', [$this, 'get_service_table_rows'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }

    public function get_common_service_cell(Environment $twig, PriceService $service)//Доработать
    {
            if (!$service->getPublished()) {
                $content = null;
            } else {
                //$content = $this->rootServiceRepository->findOneBy(['path' => $service->getPath(), 'published' => true]);
                $content = $this->rootServiceRepository->findOneBy(['path' => $service->getPath()]);
            }
            $content = $this->rootServiceRepository->findOneBy(['path' => $service->getPath()]);            
            [$class, $text] = $this->get_cell($content);
            
            return $twig->render('admin/published_services/parts/cell.html.twig', compact('class', 'text'));
          
    }

    public function get_service_table_cell(Environment $twig, Content $page, $service)//Доработать
    {

            if ($service instanceof PriceCategory) {
                //$content = $this->rootServiceRepository->findOneBy(['price_category' => $service->getId(), 'parent' => $page->getId(), 'published' => true]);
                $content = $this->rootServiceRepository->findOneBy(['price_category' => $service->getId(), 'parent' => $page->getId()]);
            } elseif ($service instanceof PriceService) {
                //$content = $this->serviceRepository->findOneBy(['service' => $service->getId(), 'parent' => $page->getId(), 'published' => true]);
                $content = $this->serviceRepository->findOneBy(['service' => $service->getId(), 'parent' => $page->getId()]);
            } else {
                return null;
            }
            
            [$class, $text] = $this->get_cell($content);
            return $twig->render('admin/published_services/parts/cell.html.twig', compact('class', 'text'));
          
    }
    
    public function get_service_table_rows(Environment $twig, array $priceCategories, array $pages, Brand $brand = null)
    {
        if ($brand) {
           $item = $this->cache->getItem('service_table_rows_' . $brand->getPriceBrand()->getCode());
        } else {
            $item = $this->cache->getItem('service_table_rows');
        }
        if ( ! $item->isHit()) {
            $html = $twig->render('admin/published_services/parts/rows.html.twig', compact('priceCategories', 'pages'));
            $item->set($html);
            $this->cache->save($item);
        }
        
        return $item->get();
    }

    /*private function get_cell(Content $content = null)
    {
        if (!$content) {
            return ['unpublished-cell', 'Не опубликовано'];
        } elseif ($content->getText()) {
            return ['published-with-text-cell', 'Опубликовано с текстом'];
        }
        return ['published-empty-cell', 'Опубликовано без текста'];
    }*/
    private function get_cell(Content $content = null)
    {
        if (!$content) {
            return ['bg-danger', 'Не создано'];
        } elseif (!$content->getPublished()) {
            return ['bg-warning', 'Не опубликовано'];
        } elseif ($content->getText()) {
            return ['bg-success', 'Опубликовано с текстом'];
        }
        return ['bg-primary', 'Опубликовано без текста'];
    }
}
