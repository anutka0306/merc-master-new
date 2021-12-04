<?php

namespace App\Controller\Admin_old;

use App\Entity\MenuTop;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuTopCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuTop::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            AssociationField::new('link'),
            NumberField::new('ordering')
        ];
    }

}
