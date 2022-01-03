<?php

namespace App\Controller\Admin;

use App\Entity\Sejours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SejoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sejours::class;
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
