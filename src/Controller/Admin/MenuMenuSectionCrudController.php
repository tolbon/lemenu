<?php

namespace App\Controller\Admin;

use App\Entity\MenuMenuSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class MenuMenuSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuMenuSection::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('menuSectionParent'),
            AssociationField::new('menuSection'),
            NumberField::new('position')
        ];
    }

}
