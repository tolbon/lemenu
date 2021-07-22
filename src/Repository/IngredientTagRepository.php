<?php

namespace App\Repository;

use App\Entity\IngredientTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IngredientTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientTag[]    findAll()
 * @method IngredientTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientTag::class);
    }

    // /**
    //  * @return IngredientTag[] Returns an array of IngredientTag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IngredientTag
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
