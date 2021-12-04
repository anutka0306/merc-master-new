<?php

namespace App\Repository;

use App\Entity\PriceServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceServices[]    findAll()
 * @method PriceServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceServices::class);
    }

    // /**
    //  * @return PriceServices[] Returns an array of PriceServices objects
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
    public function findOneBySomeField($value): ?PriceServices
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
