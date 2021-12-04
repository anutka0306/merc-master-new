<?php

namespace App\Doctrine;

use App\Entity\PriceService;
use App\Service\PageGeneratorService;
use App\Service\TranslateService;

class GeneratePagesByPriceServiceListener
{
    /**
     * @var PageGeneratorService
     */
    protected $page_generator_service;
    /**
     * @var TranslateService
     */
    protected $translate_service;
    
    public function __construct(PageGeneratorService $page_generator_service, TranslateService $translate_service)
    {
        $this->page_generator_service = $page_generator_service;
        $this->translate_service      = $translate_service;
    }
    
    public function prePersist(PriceService $price_service)
    {
        if (empty($price_service->getSlug())) {
            $slug = $this->translate_service->transliterate($price_service->getName());
            $price_service->setSlug($slug);
        }
    }
    
    public function postPersist(PriceService $price_service)
    {
        $this->page_generator_service->generateByNewService($price_service);
    }


    
}