<?php

namespace App\Repository;

use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\Video;
use App\Entity\VideoCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function getByServiceAndModel(PriceService $service, PriceModel $model, VideoCategory $category): ?Video
    {
        $result = $this->getQueryBuilderWithServiceFilter($service, $category)
            ->andWhere('b.priceModel = :priceModel')
            ->setParameter('priceModel', $model)
            ->getQuery()
            ->getResult();
        return $result[0] ?? null;
    }


    public function getByServiceAndBrand(PriceService $service, PriceBrand $brand, VideoCategory $category): ?Video
    {
        $result = $this->getQueryBuilderWithServiceFilter($service, $category)
            ->innerJoin('b.priceModel', 'm')
            ->andWhere('m.priceBrand = :priceBrand')
            ->setParameter('priceBrand', $brand->getId())
            ->getQuery()
            ->getResult();
        return $result[0] ?? null;
    }


    public function getByService(PriceService $service, VideoCategory $category): ?Video
    {
        $result = $this->getQueryBuilderWithServiceFilter($service, $category)
            ->getQuery()
            ->getResult();
        return $result[0] ?? null;
    }


    public function getQuery(?VideoCategory $category = null): Query
    {
        $builder = $this
            ->createQueryBuilder('b')
            ->orderBy('b.id', 'ASC');

        if (null !== $category) {
            $builder
                ->andWhere('b.category = :category ')
                ->setParameter('category', $category);
        }

        return $builder->getQuery();
    }

    private function getQueryBuilderWithServiceFilter(PriceService $service, VideoCategory $category)
    {
        return $this->createQueryBuilder('b')
            ->innerJoin('b.priceServices', 's')
            ->andWhere('s.id = :service_id ')
            ->andWhere('b.category = :category ')
            ->setParameter('service_id', $service->getId())
            ->setParameter('category', $category)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(1);
    }

    // /**
    //  * @return Video[] Returns an array of Video objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Video
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
