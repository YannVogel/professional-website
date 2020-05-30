<?php

namespace App\Repository;

use App\Entity\DiscoveryUrl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiscoveryUrl|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscoveryUrl|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscoveryUrl[]    findAll()
 * @method DiscoveryUrl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscoveryUrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscoveryUrl::class);
    }

    // /**
    //  * @return DiscoveryUrl[] Returns an array of DiscoveryUrl objects
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
    public function findOneBySomeField($value): ?DiscoveryUrl
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
