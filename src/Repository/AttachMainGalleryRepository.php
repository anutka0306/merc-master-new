<?php

namespace App\Repository;

use App\Entity\AttachMainGallery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttachMainGallery|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttachMainGallery|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttachMainGallery[]    findAll()
 * @method AttachMainGallery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttachMainGalleryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttachMainGallery::class);
    }

    // /**
    //  * @return AttachMainGallery[] Returns an array of AttachMainGallery objects
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
    public function findOneBySomeField($value): ?AttachMainGallery
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
