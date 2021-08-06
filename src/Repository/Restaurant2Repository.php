<?php

namespace App\Repository;

use App\Entity\Restaurant2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Restaurant2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurant2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurant2[]    findAll()
 * @method Restaurant2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Restaurant2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restaurant2::class);
    }

    // /**
    //  * @return Restaurant2[] Returns an array of Restaurant2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Restaurant2
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
