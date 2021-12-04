<?php

namespace App\Repository;

use App\Entity\BeforeAfter;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Service\BeforeAfterService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BeforeAfter|null find($id, $lockMode = null, $lockVersion = null)
 * @method BeforeAfter|null findOneBy(array $criteria, array $orderBy = null)
 * @method BeforeAfter[]    findAll()
 * @method BeforeAfter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeforeAfterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BeforeAfter::class);
    }
    
    /**
     * @param PriceService $service
     * @param PriceModel $model
     *
     * @return BeforeAfter[]
     */
    public function getByServiceAndModel(PriceService $service, PriceModel $model)
    {
        return $this->getQueryBuilderWithServiceFilter($service)
                    ->andWhere('b.priceModel = :priceModel')
                    ->setParameter('priceModel', $model)
                    ->getQuery()
                    ->getResult();
    }
    
    /**
     * @param PriceService $service
     * @param PriceBrand   $brand
     *
     * @return BeforeAfter[]
     */
    public function getByServiceAndBrand(PriceService $service, PriceBrand $brand)
    {
        return $this->getQueryBuilderWithServiceFilter($service)
                    ->innerJoin('b.priceModel','m')
                    ->andWhere('m.priceBrand = :priceBrand')
                    ->setParameter('priceBrand', $brand->getId())
                    ->getQuery()
                    ->getResult();
    }
    
    /**
     * @param PriceService $service
     *
     * @return BeforeAfter[]
     */
    public function getByService(PriceService $service)
    {
        return $this->getQueryBuilderWithServiceFilter($service)
                    ->getQuery()
                    ->getResult();
    }
    
    private function getQueryBuilderWithServiceFilter(PriceService $service)
    {
        return $this->createQueryBuilder('b')
                    ->innerJoin('b.priceServices','s')
                    ->andWhere('s.id = :service_id ')
                    ->setParameter('service_id', $service->getId())
                    ->orderBy('b.id', 'ASC')
                    ->setMaxResults(BeforeAfterService::NEED_ITEMS);
    }
    
    // /**
    //  * @return BeforeAfter[] Returns an array of BeforeAfter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BeforeAfter
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
