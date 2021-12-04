<?php

namespace App\Controller\Admin_old;

use App\Entity\PriceService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PriceServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PriceService::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Услуга')
            ->setEntityLabelInPlural('Услуги')
            ->setPaginatorPageSize(100)
            ->setSearchFields(['name', 'slug']);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id','ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            AssociationField::new('priceCategory','Категория'),
            TextField::new('slug', 'Алиас'),
            NumberField::new('hours','Кол-во нормо-часов'),
            Field::new('published', 'Опубликовано'),
            Field::new('is_popular', 'Популярная услуга'),
            TextField::new('pagetitle', 'Page Title')->hideOnIndex(),
        ];
    }

}
