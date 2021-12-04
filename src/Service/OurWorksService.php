<?php

namespace App\Service;

use App\Entity\Contracts\PageInterface;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\ServiceEntityReedInterface;
use App\Repository\OurWorksRepository;

class OurWorksService
{
    protected $our_works_repository;
    
    
    public function __construct(OurWorksRepository $our_works_repository)
    {
        $this->our_works_repository = $our_works_repository;
    }

    /**
     * @param PageInterface $content
     *
     * @return array
     */
    public function getFolder(PageInterface $content): array
    {
        if ($content instanceof ServiceEntityReedInterface) {
            return $this->serviceAlgorithm($content);
        }
        return $this->serviceAlgorithm4();
    }
    /**
     * @param ServiceEntityReedInterface $content
     *
     * @return array
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
        return '';
    }
    
    /**
     * @param PriceService $service
     * @param PriceModel   $model
     *
     * @return array
     */
    private function serviceAlgorithm1(PriceService $service, PriceModel $model):array
    {
        $folders = array();
        $items = $this->our_works_repository->getByServiceAndModel($service,$model);
        if ($items) {
            foreach ($items as $item){
                $folders[] = $item->getImgFolder();
            }
            if(empty($folders)){
                return $this->serviceAlgorithm4();
            }
            return $folders;
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
     * @return array
     */
    private function serviceAlgorithm2(PriceService $service, PriceBrand $brand):array
    {
        $folders = array();
        $items = $this->our_works_repository->getByServiceAndBrand($service,$brand);
        if ($items) {
            foreach ($items as $item){
                $folders[] = $item->getImgFolder();
            }
            return $folders;
        }

        return $this->serviceAlgorithm4();

    }

    /**
     * @param PriceService $service
     * @return string
     */
    /*private function serviceAlgorithm3(PriceService $service):string
    {
        $item = $this->our_works_repository->getByService($service);
        if ($item) {
            return $item->getImgFolder();
        }
        return $this->serviceAlgorithm4();
    }*/

    private function serviceAlgorithm3(PriceService $service):array
    {
        $folders = array();
        $items = $this->our_works_repository->getByService3($service);
        if ($items) {
            foreach ($items as $item) {
                $folders[] = $item->getImgFolder();
            }
            return $folders;
        }


        return $this->serviceAlgorithm4();
    }

    /**
     *
     * @return array
     */
    private function serviceAlgorithm4():array
    {
        $folders = array();
        $items = $this->our_works_repository->findOneLatest();
        if ($items) {
            foreach ($items as $item){
                $folders[] = $item->getImgFolder();
            }
            return $folders;
        }
        return '';
    }

}