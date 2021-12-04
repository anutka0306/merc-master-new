<?php

namespace App\Repository;

use App\Entity\SpecialOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialOffer[]    findAll()
 * @method SpecialOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialOffer::class);
    }

    // /**
    //  * @return SpecialOffer[] Returns an array of SpecialOffer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialOffer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
