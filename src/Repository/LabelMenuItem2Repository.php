<?php

namespace App\Repository;

use App\Entity\LabelMenuItem2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LabelMenuItem2|null find($id, $lockMode = null, $lockVersion = null)
 * @method LabelMenuItem2|null findOneBy(array $criteria, array $orderBy = null)
 * @method LabelMenuItem2[]    findAll()
 * @method LabelMenuItem2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabelMenuItem2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabelMenuItem2::class);
    }

    // /**
    //  * @return LabelMenuItem2[] Returns an array of LabelMenuItem2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LabelMenuItem2
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
