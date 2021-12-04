<?php

namespace App\Service;

use App\Entity\BeforeAfter;
use App\Entity\Contracts\PageInterface;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\ServiceEntityReedInterface;
use App\Repository\BeforeAfterRepository;
use Doctrine\Common\Collections\ArrayCollection;

class BeforeAfterService
{
    const NEED_ITEMS = 5;
    /**
     * @var BeforeAfterRepository
     */
    protected $before_after_repository;
    /**
     * @var ArrayCollection|BeforeAfter[]
     */
    private $items;
    
    public function __construct(BeforeAfterRepository $before_after_repository)
    {
        $this->items = new ArrayCollection();
        $this->before_after_repository = $before_after_repository;
    }

    /**
     * @param PageInterface $page
     *
     * @return array|BeforeAfter[]
     */
    public function getItems(PageInterface $page): array
    {
        if ($page instanceof ServiceEntityReedInterface) {
            return $this->serviceAlgorithm($page);
        }
        return $this->serviceAlgorithm4();
    }
    /**
     * @param ServiceEntityReedInterface $content
     *
     * @return array|BeforeAfter[]
     */
    private function serviceAlgorithm(ServiceEntityReedInterface $content):array
    {
        $service = $content->getService();
        if (! $service) {
            return $this->serviceAlgorithm4();
        }
        if ($content instanceof RootService) {
            return $this->serviceAlgorithm3($service);
        }elseif ($content instanceof Service){
            $model = $content->getPriceModel();
            if (!$model) {
                $brand = $content->getPriceBrand();
                if ( ! $brand) {
                    return $this->serviceAlgorithm3($service);
                }
                return $this->serviceAlgorithm2($service,$brand);
            }
            return $this->serviceAlgorithm1($service,$model);
        }
        return [];
    }
    
    /**
     * @param PriceService $service
     * @param PriceModel   $model
     *
     * @return array|BeforeAfter[]
     */
    private function serviceAlgorithm1(PriceService $service, PriceModel $model):array
    {
        $this->addItems($this->before_after_repository->getByServiceAndModel($service,$model));
        if ($this->getExactItems()) {
            return $this->getExactItems();
        }
        $brand = $model->getPriceBrand();
        if (! $brand) {
            return $this->serviceAlgorithm3($service);
        }
        return $this->serviceAlgorithm2($service,$brand);
    }
    
    /**
     * @param PriceService $service
     * @param PriceBrand   $brand
     *
     * @return array|BeforeAfter[]
     */
    private function serviceAlgorithm2(PriceService $service, PriceBrand $brand):array
    {
        $this->addItems($this->before_after_repository->getByServiceAndBrand($service,$brand));
        if ($this->getExactItems()) {
            return $this->getExactItems();
        }
        return $this->serviceAlgorithm3($service);
    }
    
    /**
     * @param PriceService $service
     * @return array|BeforeAfter[]
     */
    private function serviceAlgorithm3(PriceService $service):array
    {
        $this->addItems($this->before_after_repository->getByService($service));
        if ($this->getExactItems()) {
            return $this->getExactItems();
        }
        return $this->serviceAlgorithm4();
    }
    
    /**
     *
     * @return array|BeforeAfter[]
     */
    private function serviceAlgorithm4():array
    {
        $this->addItems($this->before_after_repository->findBy([],['id'=>'asc']));
        if ($this->getExactItems()) {
            return $this->getExactItems();
        }
        return $this->items;
    }
    
    
    
    private function addItems(?iterable $items)
    {
        if (empty($items)) {
            return;
        }
        foreach ($items as $item) {
            if ($this->items->count() >= self::NEED_ITEMS ) {
                return;
            }
            if (! $this->items->contains($item)) {
                $this->items->add($item);
            }
        }
    }
    /**
     *
     * @return null|array|BeforeAfter[]
     */
    private function getExactItems():?array
    {
        if ($this->items->count() == self::NEED_ITEMS) {
            return $this->items->toArray();
        }
        if ($this->items->count() < self::NEED_ITEMS){
            return null;
        }
        return $this->items->slice(0,self::NEED_ITEMS);
    }
}