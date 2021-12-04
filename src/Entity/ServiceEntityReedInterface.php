<?php

namespace App\Entity;

interface ServiceEntityReedInterface
{
    public function getPriceCategory(): ?PriceCategory;
    public function getService(): ?PriceService;
}