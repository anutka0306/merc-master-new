<?php

namespace App\Repository;

use App\Entity\PriceService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceService|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceService|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceService[]    findAll()
 * @method PriceService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceService::class);
    }

    // /**
    //  * @return PriceService[] Returns an array of PriceService objects
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
    public function findOneBySomeField($value): ?PriceService
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
