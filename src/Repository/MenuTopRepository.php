<?php

namespace App\Repository;

use App\Entity\MenuTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuTop[]    findAll()
 * @method MenuTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuTopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuTop::class);
    }

    // /**
    //  * @return MenuTop[] Returns an array of MenuTop objects
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
    public function findOneBySomeField($value): ?MenuTop
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
