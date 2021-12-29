<?php

namespace App\Model;

use App\Dto\YmlOfferDto;
use App\Repository\ServiceRepository;
use App\Service\PriceListHelper;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;
use App\Repository\PriceModelRepository;
use App\Repository\RootServiceRepository;

class YmlModel
{
    /**
     * @var Connection
     */
    protected $connection;
    /**
     * @var ServiceRepository
     */
    protected $service_repository;
    /**
     * @var PriceListHelper
     */
    protected $price_list_helper;

    /**
     * @var PriceModelRepository
     */
    protected $priceModelRepository;

    /**
     * @var RootServiceRepository
     */
    protected $rootServiceRepository;

    public function __construct(Connection $connection,ServiceRepository $service_repository, PriceListHelper $price_list_helper, PriceModelRepository $priceModelRepository, RootServiceRepository $rootServiceRepository)
    {
        
        $this->connection = $connection;
        $this->service_repository = $service_repository;
        $this->price_list_helper = $price_list_helper;
        $this->priceModelRepository = $priceModelRepository;
        $this->rootServiceRepository = $rootServiceRepository;
    }
    
    /**
     * @return YmlOfferDto[]
     */
    public function getOffers():array
    {
        $offers=[];
        //$pages = $this->service_repository->findBy(['published'=>true]);
        $pages = $this->rootServiceRepository->findAll();
        foreach ($pages as $index => $page) {
            if ($page->getService() == null){
                continue;
            }
            $offer = new YmlOfferDto();
            $offer->id = $page->getId();
            $offer->path = $page->getPath();
            $offer->meta_title = htmlspecialchars($page->getName());
            $offer->meta_description = htmlspecialchars($page->getName()) . ' в Санкт-Петербурге.✔ Ежедневно 9:00 - 21:00 ✔ Ремонт в день обращения ✔ Стоимость и цены. ✔ Гарантия 1 год! Профильный автосервис «ПИК» - ☎ +74993911874';
            $offer->price = $this->price_list_helper->getPrice($page, $this->priceModelRepository);
            $offers[] = $offer;
        }
        return $offers;
    }
    
    public function getMainPageData()
    {
        $query  = $this->connection
            ->createQueryBuilder()
            ->select('c.h1, c.meta_title, c.meta_description')
            ->from('content','c')
            ->andWhere("path = '/'");
        $result = $query->execute();
        $result->setFetchMode(FetchMode::STANDARD_OBJECT);
        return $result->fetch();
    }
    
}