<?php

namespace App\Repository;

use App\Entity\MenuLeft;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuLeft|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuLeft|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuLeft[]    findAll()
 * @method MenuLeft[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuLeftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuLeft::class);
    }

    // /**
    //  * @return MenuLeft[] Returns an array of MenuLeft objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuLeft
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
