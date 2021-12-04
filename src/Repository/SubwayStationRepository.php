<?php

namespace App\Repository;

use App\Entity\SubwayStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubwayStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubwayStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubwayStation[]    findAll()
 * @method SubwayStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubwayStationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubwayStation::class);
    }

    // /**
    //  * @return SubwayStation[] Returns an array of SubwayStation objects
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
    public function findOneBySomeField($value): ?SubwayStation
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
