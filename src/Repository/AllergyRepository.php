<?php

namespace App\Repository;

use App\Entity\Allergy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ParameterType;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\DBAL\Query\QueryBuilder;

/**
 * @method Allergy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allergy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allergy[]    findAll()
 * @method Allergy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllergyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allergy::class);
    }

    // /**
    //  * @return Allergy[] Returns an array of Allergy objects
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
    public function findOneBySomeField($value): ?Allergy
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllAllergyOfIds(array $menuItemIds)
    {
        $qb = $this->_em->getConnection()->createQueryBuilder();

        $qb->select('mia.menu_item_id', 'a.id', 'a.name')
            ->from('menu_item_allergy', 'mia')
            ->innerJoin('mia', 'allergy', 'a', 'mia.allergy_id = a.id')
            ->where($qb->expr()->in('mia.menu_item_id', ':menuItemIds'))
            ->setParameter('menuItemIds', $menuItemIds, \Doctrine\DBAL\Connection::PARAM_INT_ARRAY);

        return $qb->execute()->fetchAllAssociativeIndexed();
    }
}
