<?php

namespace App\Repository;

use App\Entity\ServiceWithout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceWithout|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceWithout|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceWithout[]    findAll()
 * @method ServiceWithout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceWithoutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceWithout::class);
    }

    // /**
    //  * @return ServiceWithout[] Returns an array of ServiceWithout objects
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
    public function findOneBySomeField($value): ?ServiceWithout
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
