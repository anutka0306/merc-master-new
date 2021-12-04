<?php

namespace App\Repository;

use App\Entity\DayOfWeek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DayOfWeek|null find($id, $lockMode = null, $lockVersion = null)
 * @method DayOfWeek|null findOneBy(array $criteria, array $orderBy = null)
 * @method DayOfWeek[]    findAll()
 * @method DayOfWeek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayOfWeekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DayOfWeek::class);
    }

    // /**
    //  * @return DayOfWeek[] Returns an array of DayOfWeek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DayOfWeek
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
