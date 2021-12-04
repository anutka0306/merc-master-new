<?php

namespace App\Doctrine;

use App\Entity\PriceService;
use App\Entity\PriceCategory;
use App\Service\PageGeneratorService;
use App\Service\TranslateService;

class GeneratePagesByPriceCategoryListener
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
    
    public function prePersist(PriceCategory $priceCategory)
    {
        if (empty($priceCategory->getSlug())) {
            $slug = $this->translate_service->transliterate($priceCategory->getName());
            $priceCategory->setSlug($slug);
        }
    }
    
    public function postPersist(PriceCategory $priceCategory)
    {
        $this->page_generator_service->generateByNewCategory($priceCategory);
    }
    
}