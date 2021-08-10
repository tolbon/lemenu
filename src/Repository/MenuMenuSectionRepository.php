<?php

namespace App\Repository;

use App\Entity\MenuMenuSection2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuMenuSection2|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuMenuSection2|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuMenuSection2[]    findAll()
 * @method MenuMenuSection2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuMenuSection2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuMenuSection2::class);
    }

    // /**
    //  * @return MenuMenuSection2[] Returns an array of MenuMenuSection2 objects
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
    public function findOneBySomeField($value): ?MenuMenuSection2
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
