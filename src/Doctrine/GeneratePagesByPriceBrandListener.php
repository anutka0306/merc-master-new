<?php

namespace App\Doctrine;

use App\Entity\PriceBrand;
use App\Service\PageGeneratorService;

class GeneratePagesByPriceBrandListener
{
    /**
     * @var PageGeneratorService
     */
    protected $page_generator_service;
    
    public function __construct(PageGeneratorService $page_generator_service)
    {
        $this->page_generator_service = $page_generator_service;
    }
    
    public function postPersist(PriceBrand $price_brand)
    {
        $this->page_generator_service->generateByNewBrand($price_brand);
    }
    
}