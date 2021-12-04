<?php

namespace App\Repository;

use App\Entity\RootService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RootService|null find($id, $lockMode = null, $lockVersion = null)
 * @method RootService|null findOneBy(array $criteria, array $orderBy = null)
 * @method RootService[]    findAll()
 * @method RootService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RootServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RootService::class);
    }

    /**
     * @return RootService[] Returns an array of RootService objects
     */
    public function findByPriceCategories(array $priceCategories): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.price_category in(:ids)')
            ->setParameter('ids', $priceCategories)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return RootService[] Returns an array of RootService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RootService
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
