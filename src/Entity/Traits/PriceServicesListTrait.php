<?php

namespace App\Entity\Traits;

trait PriceServicesListTrait
{
    public function priceServicesList()
    {
        if ($this->getPriceServices()->count()) {
            $services = [];
            foreach ($this->getPriceServices() as $price_service) {
                $services[] = $price_service->getName();
            }
            return implode(',',$services);
        }else{
            return 'Нет';
        }
    }
}