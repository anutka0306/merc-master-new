<?php

namespace App\Model;

use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\Service;
use Symfony\Component\Validator\Constraints as Assert;

class PageGeneratorModel
{
    const URL_REGENERATE_NONE = 0;
    const URL_REGENERATE_UNPUBLISHED = 1;
    const URL_REGENERATE_ALL = 2;
    const URL_REGENERATE_CHOICES = [
        self::URL_REGENERATE_NONE => 'Оставить без изменений',
        self::URL_REGENERATE_UNPUBLISHED => 'Только неопубликованные',
        self::URL_REGENERATE_ALL => 'Все',
    ];
    /**
     * @var PriceBrand[]
     * @Assert\Expression(
     *     "this.models[0] or value[0]",
     *     message="Выберите марку или модель"
     *     )
     */
    public $brands;
    /**
     * @var PriceModel[]
     * @Assert\Expression(
     *     "this.brands[0] or value[0]",
     *     message="Выберите марку или модель"
     *     )
    */
    public $models;
    /**
    * @var PriceService
    * @Assert\NotBlank(message="Выберите услугу")
    */
    public $service;
    /**
     * @Assert\NotBlank(message="Укажите заголовок H1")
     */
    public $h1;
    /**
     * @Assert\NotBlank(message="Укажите мета-описание")
     */
    public $metaDescription;
    /**
     * @Assert\NotBlank(message="Укажите текст")
     */
    public $text;

    public $urlRegenerate;
    
    /**
     * @return Service[]
     */
    public function getMatchedPages()
    {
        $pages_of_service = $this->service->getContents();
        $pages = [];
        foreach ($pages_of_service as $page) {
            $parent = $page->getParent();
            if ($parent instanceof Brand && $this->matchesBrand($parent)) {
                $pages[] = $page;
            }
            if ($parent instanceof Model && $this->matchesModel($parent)) {
                $pages[] = $page;
            }
        }
        return $pages;
    }
    
    private function matchesBrand(Brand $brand):bool
    {
        if (count($this->brands)===0) {
            return false;
        }
        foreach ($this->brands as $price_brand) {
            if ($brand->getPriceBrand()->getId() === $price_brand->getId()) {
                return true;
            }
        }
        return false;
    }
    
    private function matchesModel(Model $model):bool
    {
        if (count($this->models)===0) {
            return false;
        }
        foreach ($this->models as $price_model) {
            if ($model->getPriceModel()->getId() === $price_model->getId()) {
                return true;
            }
        }
        return false;
    }
}