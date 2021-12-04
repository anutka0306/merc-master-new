<?php

namespace App\Repository;

use App\Entity\Sitemap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sitemap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sitemap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sitemap[]    findAll()
 * @method Sitemap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SitemapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sitemap::class);
    }

    // /**
    //  * @return Sitemap[] Returns an array of Sitemap objects
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
    public function findOneBySomeField($value): ?Sitemap
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
