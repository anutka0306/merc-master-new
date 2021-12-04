<?php

namespace App\Repository;

use App\Entity\PriceModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceModel[]    findAll()
 * @method PriceModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceModel::class);
    }

    // /**
    //  * @return PriceModel[] Returns an array of PriceModel objects
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
    public function findOneBySomeField($value): ?PriceModel
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
