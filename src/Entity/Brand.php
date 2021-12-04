<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrandRepository")
 */
class Brand extends Content
{
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PriceBrand", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="brand_id")
     */
    private $priceBrand;

    public function getBrand(): ?Brand
    {
        return $this;
    }

    public function getModel(): ?Model
    {
        return null;
    }

    public function setPriceBrand(?PriceBrand $brand): self
    {
        $this->priceBrand = $brand;

        return $this;
    }
    
    public function getBrandName():string
    {
        return $this->getPriceBrand()->getName();
    }
    
    public function getBrandAndModelName():string
    {
        return $this->getBrandName();
    }
    
    public function getPriceBrand():?PriceBrand
    {
        return $this->priceBrand;
    }
    
    public function getPriceModel():?PriceModel
    {
        return null;
    }
    
    public function getBrandModelWithTranslation():string
    {
        return $this->getPriceBrand()->getBrandModelWithTranslation();
    }
}
