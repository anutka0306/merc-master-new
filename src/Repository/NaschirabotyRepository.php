<?php

namespace App\Repository;

use App\Entity\Naschiraboty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Naschiraboty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Naschiraboty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Naschiraboty[]    findAll()
 * @method Naschiraboty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NaschirabotyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Naschiraboty::class);
    }

    // /**
    //  * @return Naschiraboty[] Returns an array of Naschiraboty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Naschiraboty
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
