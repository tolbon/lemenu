<?php

namespace App\Repository;

use App\Entity\Allergy2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Allergy2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allergy2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allergy2[]    findAll()
 * @method Allergy2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Allergy2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allergy2::class);
    }

    // /**
    //  * @return Allergy2[] Returns an array of Allergy2 objects
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
    public function findOneBySomeField($value): ?Allergy2
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
