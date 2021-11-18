<?php

namespace App\Controller\Admin;

use App\Entity\ImagesRestaurants;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImagesRestaurantsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesRestaurants::class;
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
