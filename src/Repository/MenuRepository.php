<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Menu;
use App\Entity\MenuSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Menu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu[]    findAll()
 * @method Menu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    // /**
    //  * @return Menu[] Returns an array of Menu objects
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

    public function findMyMenu($restaurant, $menuUrlSlug): ?Menu
    {
        /** @var Menu|null $menu */
        $menu = $this->createQueryBuilder('m')
            ->andWhere('m.restaurant = :restaurant')
            ->andWhere('m.urlSlug = :urlSlug')
            ->setParameter('restaurant', $restaurant)
            ->setParameter('urlSlug', $menuUrlSlug)
            ->getQuery()
            ->getOneOrNullResult()
        ;

        if ($menu === null) {
            return null;
        }

        $this->recursiveSection($menu->getHasMenuSection());

        return $menu;
    }

    /**
     * @param Collection|MenuSection[] $menuSection
     */
    private function recursiveSection($menuSection) {
        foreach ($menuSection as $childSection) {
            $this->recursiveSection($childSection->getHasMenuSection());
            $childSection->getHasMenuItem();
        }
    }
}
