<?php

namespace App\Controller\Admin;

use App\Entity\MenuHasMenuSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MenuHasMenuSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuHasMenuSection::class;
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
