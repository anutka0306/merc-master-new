<?php

namespace App\Service;

use App\Entity\Contracts\PageInterface;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\ServiceEntityReedInterface;
use App\Entity\Video;
use App\Entity\VideoCategory;
use App\Repository\VideoCategoryRepository;
use App\Repository\VideoRepository;

class VideoService
{
    /**
     * @var VideoRepository
     */
    protected $video_repository;
    /**
     * @var VideoCategoryRepository
     */
    private $videoCategoryRepository;

    public function __construct(VideoRepository $video_repository,VideoCategoryRepository $videoCategoryRepository)
    {
        $this->video_repository = $video_repository;
        $this->videoCategoryRepository = $videoCategoryRepository;
    }

    /**
     * @param PageInterface $page
     * @return Video[]|null
     */
    public function getItems(PageInterface $page):?array
    {
        if (!$page instanceof ServiceEntityReedInterface) {
            return null;
        }
        $categories = $this->videoCategoryRepository->findAll();
        $items = [];
        foreach ($categories as $category) {
            $items[] = $this->serviceAlgorithm($page,$category);
        }
        return $items;
    }
    
    private function serviceAlgorithm(ServiceEntityReedInterface $content,VideoCategory $category):?Video
    {
        $service = $content->getService();
        if (! $service) {
            return null;
        }
        if ($content instanceof RootService) {
            return $this->serviceAlgorithm3($service,$category);
        }elseif ($content instanceof Service){
            $model = $content->getPriceModel();
            if (!$model) {
                $brand = $content->getPriceBrand();
                if ( ! $brand) {
                    return $this->serviceAlgorithm3($service,$category);
                }
                return $this->serviceAlgorithm2($service,$brand,$category);
            }
            return $this->serviceAlgorithm1($service,$model,$category);
        }
        return null;
    }
   
    private function serviceAlgorithm1(PriceService $service, PriceModel $model,VideoCategory $category):?Video
    {
        $item = $this->video_repository->getByServiceAndModel($service,$model,$category);
        if ($item) {
            return $item;
        }
        $brand = $model->getPriceBrand();
        if (! $brand) {
            return $this->serviceAlgorithm3($service,$category);
        }
        return $this->serviceAlgorithm2($service,$brand,$category);
    }
    
    private function serviceAlgorithm2(PriceService $service, PriceBrand $brand,VideoCategory $category):?Video
    {
        $item = $this->video_repository->getByServiceAndBrand($service,$brand,$category);
        if ($item) {
            return $item;
        }
        return $this->serviceAlgorithm3($service,$category);
    }
    
    private function serviceAlgorithm3(PriceService $service,VideoCategory $category):?Video
    {
        return $this->video_repository->getByService($service,$category);
    }
}