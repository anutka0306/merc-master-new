<?php

namespace App\Doctrine;

use App\Entity\PriceModel;
use App\Service\PageGeneratorService;
use App\Entity\Content;

class GeneratePagesByPriceModelListener
{
    /**
     * @var PageGeneratorService
     */
    protected $page_generator_service;
    
    public function __construct(PageGeneratorService $page_generator_service)
    {
        $this->page_generator_service = $page_generator_service;
    }
    
    public function postPersist(PriceModel $price_model)
    {
        $this->page_generator_service->generateByNewModel($price_model);
    }

    public function preRemove(PriceModel $priceModel){
        $this->page_generator_service->removeByModel($priceModel);
    }
    
}