<?php

namespace App\Controller\Admin;

use App\Entity\MenuSection;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuSection::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        /*
                $u = $this->getUser();
                $qb->innerJoin('entity.manager', 'userId');
                $qb->andWhere('userId = :userId')->setParameter('userId', $u->getId());
        */
        return $qb;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            BooleanField::new('displayCurrencySymbolOnTitle'),
            BooleanField::new('displayCurrencyOnChildren'),
            BooleanField::new('displayChildrenSectionAfterMenuItems'),
            AssociationField::new('restaurant'),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('restaurant')
            ;
    }

}
