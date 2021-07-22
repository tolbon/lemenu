<?php

namespace App\Repository;

use App\Entity\MenuItemTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuItemTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuItemTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuItemTag[]    findAll()
 * @method MenuItemTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuItemTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuItemTag::class);
    }

    // /**
    //  * @return MenuItemTag[] Returns an array of MenuItemTag objects
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
    public function findOneBySomeField($value): ?MenuItemTag
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
