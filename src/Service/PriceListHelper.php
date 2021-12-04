<?php

namespace App\Service;

use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
use App\Entity\PriceBrand;
use App\Entity\PriceCategory;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\ServiceEntityReedInterface;
use App\Repository\PriceModelRepository;

class PriceListHelper
{
    /**
     * @var ConfigService
     */
    protected $config;

    /**
     * @var PriceModelRepository
     */
    protected $priceModelRepository;
    
    public function __construct(ConfigService $config, PriceModelRepository $priceModelRepository)
    {
        $this->config = $config;
        $this->priceModelRepository = $priceModelRepository;
    }
    
    public function getRootCategory(PageInterface $page): ?PriceCategory
    {
        if ($page instanceof ServiceEntityReedInterface) {
            if ($page->getService()) {
                $category = $page->getService()->getPriceCategory();
            } elseif ($page->getPriceCategory()) {
                $category = $page->getPriceCategory();
            } else {
                return null;
            }
            
            return $this->getRootRecursive($category);
        }
        
        return null;
    }
    
    public function isDetailing(PageInterface $page): bool
    {
        if (!$page instanceof Content) {
            return false;
        }
        $root_category = $this->getRootCategory($page);
        if ( ! $root_category) {
            return false;
        }
        $detailing_category_id = (int)$this->config->getCached('whatsapp.detailing');
    
        return $detailing_category_id === $root_category->getId();
    }
    
    
    
    public function getPrice(PageInterface $page, PriceModelRepository $priceModelRepository):?int
    {
        if (! $page instanceof RootService) {
            return null;
        }
        $price_service = $page->getService();
        
        if (!$price_service) {
            return null;
        }
        $price_service->setPriceByContent($page, $priceModelRepository);
        return $price_service->getPrice();
    }
    
    private function getRootRecursive(PriceCategory $category)
    {
        if ($category->getParent()) {
            return $this->getRootRecursive($category->getParent());
        }
        
        return $category;
    }
    
}