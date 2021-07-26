<?php

namespace App\Repository;

use App\Entity\MenuHasMenuSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuHasMenuSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuHasMenuSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuHasMenuSection[]    findAll()
 * @method MenuHasMenuSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuHasMenuSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuHasMenuSection::class);
    }

    // /**
    //  * @return MenuHasMenuSection[] Returns an array of MenuHasMenuSection objects
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
    public function findOneBySomeField($value): ?MenuHasMenuSection
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
