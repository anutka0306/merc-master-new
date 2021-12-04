<?php

namespace App\Repository;

use App\Entity\OurWorks;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OurWorks|null find($id, $lockMode = null, $lockVersion = null)
 * @method OurWorks|null findOneBy(array $criteria, array $orderBy = null)
 * @method OurWorks[]    findAll()
 * @method OurWorks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OurWorksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OurWorks::class);
    }
    
    public function getByServiceAndModel(PriceService $service, PriceModel $model):?Array
    {
        $result = $this->getQueryBuilderWithServiceFilter($service)
                       ->andWhere('b.priceModel = :priceModel')
                       ->setParameter('priceModel', $model)
                       ->getQuery()
                       ->getResult();
        $totalResult = array();
        foreach ($result as $result_item){
            $totalResult[] = $result_item;
        }
        return $totalResult??null;
    }
    
    
    public function getByServiceAndBrand(PriceService $service, PriceBrand $brand):?Array
    {
        $result = $this->getQueryBuilderWithServiceFilter($service)
                       ->innerJoin('b.priceModel','m')
                       ->andWhere('m.priceBrand = :priceBrand')
                       ->setParameter('priceBrand', $brand->getId())
                       ->getQuery()
                       ->getResult();
        $totalResult = array();
        foreach ($result as $result_item){
            $totalResult[] = $result_item;
        }
        return $totalResult??null;
    }
    
    
    public function getByService(PriceService $service):?OurWorks
    {
        $result = $this->getQueryBuilderWithServiceFilter($service)
                       ->getQuery()
                       ->getResult();
        return $result[0]??null;
    }

    public function getByService3(PriceService $service):?Array
    {
        $result = $this->getQueryBuilderWithServiceFilter($service)
            ->getQuery()
            ->getResult();
        $totalResult = array();
        foreach ($result as $result_item){
            $totalResult[] = $result_item;
        }
        return $totalResult??null;
    }
    
    public function findOneLatest(): ?Array
    {
        $result = $this->createQueryBuilder('o')
                    ->orderBy('o.id', 'DESC')
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getResult();
        return $result??null;
    }
    
    private function getQueryBuilderWithServiceFilter(PriceService $service)
    {
        return $this->createQueryBuilder('b')
                    ->innerJoin('b.priceServices','s')
                    ->andWhere('s.id = :service_id ')
                    ->setParameter('service_id', $service->getId())
                    ->orderBy('b.id', 'ASC')
                    ->setMaxResults(3);
    }
    
    // /**
    //  * @return OurWorks[] Returns an array of OurWorks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OurWorks
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
