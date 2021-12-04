<?php

namespace App\Controller\Admin_old;

use App\Entity\PriceClass;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class PriceClassCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PriceClass::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Классы')
            ->setEntityLabelInSingular('Класс');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            NumberField::new('priceOfHour', 'Цена за нормо-час'),
        ];
    }

}
