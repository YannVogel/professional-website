<?php

namespace App\Repository;

use App\Entity\DiscoveryCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiscoveryCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscoveryCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscoveryCategory[]    findAll()
 * @method DiscoveryCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscoveryCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscoveryCategory::class);
    }

    // /**
    //  * @return DiscoveryCategory[] Returns an array of DiscoveryCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiscoveryCategory
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
