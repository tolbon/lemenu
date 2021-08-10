<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\MenuItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuItem[]    findAll()
 * @method MenuItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuItem::class);
    }

    // /**
    //  * @return MenuItem[] Returns an array of MenuItem objects
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
    public function findOneBySomeField($value): ?MenuItem
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
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

    public function findAllAllergyOfIds2(array $menuItemIds)
    {
        $qb = $this->createQueryBuilder('mi');
        
        $query = $qb->select('a')
            ->innerJoin('mi.allergies', 'a')
            ->andWhere($qb->expr()->in('mi.id', ':menuItemsIds'))
            ->setParameter('menuItemsIds', $menuItemIds)
            ->getQuery();
        $query->setHint(Query::HINT_READ_ONLY, true);
        
        return $query->getResult();
    }

    public function findAllDietOfIds2(array $menuItemIds)
    {
        $qb = $this->createQueryBuilder('mi');

        return $qb->select('d')
            ->innerJoin('mi.diets', 'd')
            ->andWhere($qb->expr()->in('mi.id', ':menuItemsIds'))
            ->setParameter('menuItemsIds', $menuItemIds)
            ->getQuery()
            ->getResult()
        ;
    }

}
