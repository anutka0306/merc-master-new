<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 */
class Model extends Content
{

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PriceModel", cascade={"persist", "remove"}, fetch="EAGER")
     * @ORM\JoinColumn(name="model_id")
     */
    private $priceModel;
    

    public function setPriceModel(?PriceModel $model): self
    {
        $this->priceModel = $model;

        return $this;
    }


    public function getPriceBrand():?PriceBrand
    {
        $model = $this->getPriceModel();
        if (!$model) {
            return null;
        }
        $brand = $model->getPriceBrand();
        if (!$brand) {
            return null;
        }
        return $brand;
    }
    
    public function getPriceModel():?PriceModel
    {
        return $this->priceModel;
    }
    
    public function getModelName():string
    {
        $model = $this->getPriceModel();
        if (!$model) {
            return '';
        }
        return $model->getName();
    }

    public function getModelCode():string
    {
        $model = $this->getPriceModel();
        if(!$model){
            return '';
        }
        return $model->getCode();
    }
    
    public function getBrandName():string
    {
        $brand = $this->getPriceBrand();
        if (!$brand) {
            return '';
        }
        return $brand->getName();
    }
    
    public function getBrandAndModelName():string
    {
        $model = $this->getPriceModel();
        if (!$model) {
            return '';
        }
        return $this->getBrandName().' '.$model->getName();
    }
    
    public function getModel(): ?Model
    {
        return $this;
    }
    
    public function getBrand(): ?Brand
    {
        $parent = $this->getParent();
        if ($parent instanceof Brand) {
            return $parent;
        }
        return null;
    }
    
    public function getBrandModelWithTranslation():string
    {
        return $this->getPriceModel()->getBrandModelWithTranslation();
    }
    
    
}
