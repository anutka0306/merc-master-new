<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\PriceBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceBrand[]    findAll()
 * @method PriceBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceBrandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceBrand::class);
    }

    /**
     * @param array $exclude
     *
     * @return PriceBrand[] Returns an array of Brand objects
     */
    public function findAllWithOutExcludedNames(array $exclude): array
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.position', 'ASC');
        if (count($exclude)) {
            $query->andWhere('m.name NOT IN(:val)')
                ->setParameter('val', $exclude);
        }
        return $query->getQuery()
            ->getResult();
    }

    /**
     * @return PriceBrand[] Returns an array of Brand objects
     */
    public function findPopular(): array
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.position', 'ASC')
            ->setMaxResults(26);
        return $query->getQuery()
            ->getResult();
    }

    /**
     * @return PriceBrand[]
     */
    public function findAllWithModels(): array
    {
        return $this->createQueryBuilder('b')
            ->addSelect('m')
            ->orderBy('b.position', 'ASC')
            ->join('b.priceModels', 'm')
            ->getQuery()
            ->getResult();
    }
    
    
    public function findAllWithPath($service = null):array
    {

        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addScalarResult('name', 'name', 'string');
        $rsm->addScalarResult('code', 'code', 'string');
        $rsm->addScalarResult('path', 'path', 'string');
        $rsm->addScalarResult('photo', 'photo', 'string');
        $rsm->addScalarResult('published', 'published', 'int');


            $sql = "
            SELECT b.name, b.code, b.photo, c.path
            FROM price__brand b
            LEFT JOIN content c on b.id = c.brand_id 
            WHERE c.published > 0
            GROUP BY b.name
            ORDER BY b.name ASC
        ";
            $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
            return $query->getResult();

    }

    public function findOneWithPath($id):array
    {
        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addScalarResult('name', 'name', 'string');
        $rsm->addScalarResult('name_rus', 'nameRus', 'string');
        $rsm->addScalarResult('path', 'path', 'string');

        $sql = "
            SELECT b.name, b.name_rus, c.path
            FROM price__brand b
            JOIN content c on b.id = c.brand_id 
            WHERE  b.id = {$id} LIMIT 1
        ";

        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);

        return $query->getResult();
    }


    // /**
    //  * @return PriceBrand[] Returns an array of PriceBrand objects
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
    public function findOneBySomeField($value): ?PriceBrand
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
