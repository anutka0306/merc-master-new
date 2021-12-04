<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RootServiceRepository")
 */
class RootService extends Content implements ServiceEntityReedInterface
{
    /**
     * @ORM\OneToOne(targetEntity="PriceService", cascade={"persist", "remove"})
     */
    private $service;
    /**
     * @ORM\ManyToOne(targetEntity="PriceCategory")
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
    
    
    public function getPriceCategory(): ?PriceCategory
    {
        return $this->price_category;
    }
    
    public function setPriceCategory(?PriceCategory $price_category): self
    {
        $this->price_category = $price_category;
        
        return $this;
    }
}
