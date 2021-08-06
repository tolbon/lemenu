<?php

namespace App\Repository;

use App\Entity\Diet2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Diet2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diet2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diet2[]    findAll()
 * @method Diet2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Diet2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diet2::class);
    }

    // /**
    //  * @return Diet2[] Returns an array of Diet2 objects
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
    public function findOneBySomeField($value): ?Diet2
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
