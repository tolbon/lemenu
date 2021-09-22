<?php

namespace App\Controller\Admin;

use App\Entity\MenuSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MenuSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuSection::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
