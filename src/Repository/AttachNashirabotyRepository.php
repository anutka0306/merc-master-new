<?php

namespace App\Repository;

use App\Entity\AttachNashiraboty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttachNashiraboty|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttachNashiraboty|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttachNashiraboty[]    findAll()
 * @method AttachNashiraboty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttachNashirabotyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttachNashiraboty::class);
    }

    // /**
    //  * @return AttachNashiraboty[] Returns an array of AttachNashiraboty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttachNashiraboty
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
