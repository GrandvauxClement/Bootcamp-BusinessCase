<?php

namespace App\Controller\Admin;

use App\Entity\TypeCuisine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCuisineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCuisine::class;
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
