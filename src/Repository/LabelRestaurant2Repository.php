<?php

namespace App\Repository;

use App\Entity\LabelRestaurant2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LabelRestaurant2|null find($id, $lockMode = null, $lockVersion = null)
 * @method LabelRestaurant2|null findOneBy(array $criteria, array $orderBy = null)
 * @method LabelRestaurant2[]    findAll()
 * @method LabelRestaurant2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabelRestaurant2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabelRestaurant2::class);
    }

    // /**
    //  * @return LabelRestaurant2[] Returns an array of LabelRestaurant2 objects
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
    public function findOneBySomeField($value): ?LabelRestaurant2
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
