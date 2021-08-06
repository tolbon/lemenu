<?php

namespace App\Repository;

use App\Entity\LabelMenuItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LabelMenuItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method LabelMenuItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method LabelMenuItem[]    findAll()
 * @method LabelMenuItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabelMenuItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabelMenuItem::class);
    }

    // /**
    //  * @return Label[] Returns an array of Label objects
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
    public function findOneBySomeField($value): ?Label
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
