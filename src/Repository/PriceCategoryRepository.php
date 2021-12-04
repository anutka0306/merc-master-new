<?php

namespace App\Repository;

use App\Entity\PriceCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceCategory[]    findAll()
 * @method PriceCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceCategory::class);
    }
    /**
     * @return PriceCategory[] Returns an array of PriceCategory objects
     */
    public function findRoots()
    {
        return $this->createQueryBuilder('c')
                    ->andWhere('c.parent IS NULL')
                    ->orderBy('c.id', 'ASC')
                    ->getQuery()
                    ->getResult()
            ;
    }
    
    // /**
    //  * @return PriceCategory[] Returns an array of PriceCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceCategory
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
