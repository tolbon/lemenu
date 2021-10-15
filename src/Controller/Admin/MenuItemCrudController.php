<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\MenuItem;
use App\Entity\Restaurant;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuItem::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        /*
                $u = $this->getUser();
                $qb->innerJoin('entity.manager', 'userId');
                $qb->andWhere('userId = :userId')->setParameter('userId', $u->getId());
        */
        $restaurantId = $searchDto->getRequest()->query->getAlnum('restaurantId', '');
        $menuId = $searchDto->getRequest()->query->getAlnum('menuId', '');

        if ($restaurantId !== '') {
            $restaurant = $this->getDoctrine()->getRepository(Restaurant::class)->find($restaurantId);
            $qb->andWhere('entity.restaurant = :restaurant')
                ->setParameter('restaurant', $restaurant);
        }
        if ($menuId !== '') {
            $menu = $this->getDoctrine()->getRepository(Menu::class)->find($menuId);
            $qb->andWhere('entity. = :menu')
                ->setParameter('menu', $menu);
        }
        return $qb;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('restaurant'),
        ];
    }
}
