<?php

namespace App\Repository;

use App\Entity\MenuSection2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuSection2|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuSection2|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuSection2[]    findAll()
 * @method MenuSection2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuSection2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuSection2::class);
    }

    // /**
    //  * @return MenuSection2[] Returns an array of MenuSection2 objects
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
    public function findOneBySomeField($value): ?MenuSection2
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
