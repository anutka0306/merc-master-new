<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service extends Content implements ServiceEntityReedInterface
{
    /**
     * @ORM\ManyToOne(targetEntity="PriceService", inversedBy="contents")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="PriceCategory", inversedBy="contents")
     */
    private $price_category;
    

    public function getService(): ?PriceService
    {
        return $this->service;
    }

    public function setService(?PriceService $service): self
    {
        $this->service = $service;

        return $this;
    }
    
    public function getBrandName():string
    {
        $parent = $this->getParent();
        return $parent->getBrandName();
    }
    
    public function getBrandAndModelName():string
    {
        $parent = $this->getParent();
        return $parent->getBrandAndModelName();
    }

    public function getPriceCategory(): ?PriceCategory
    {
        return $this->price_category;
    }

    public function setPriceCategory(?PriceCategory $price_category): self
    {
        $this->price_category = $price_category;

        return $this;
    }
    
    public function getPriceBrand():?PriceBrand
    {
        $parent = $this->getParent();
        if ( ! $parent) {
            return null;
        }
        return $this->getParent()->getPriceBrand();
    }
    
    public function getPriceModel():?PriceModel
    {
        return $this->getParent()->getPriceModel();
    }
    
    public function getBrand():?Brand
    {
        return $this->getParent()->getBrand();
    }
    
    public function getModel():?Model
    {
        return $this->getParent()->getModel();
    }
    
    public function getBrandModelWithTranslation():string
    {
        return $this->getParent()->getBrandModelWithTranslation();
    }
}
