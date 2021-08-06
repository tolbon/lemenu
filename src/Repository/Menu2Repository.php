<?php

namespace App\Repository;

use App\Entity\Menu2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Menu2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu2[]    findAll()
 * @method Menu2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Menu2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu2::class);
    }

    // /**
    //  * @return Menu2[] Returns an array of Menu2 objects
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
    public function findOneBySomeField($value): ?Menu2
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
