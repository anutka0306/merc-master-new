<?php

namespace App\Controller\Admin_old;

use App\Entity\PriceModel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class PriceModelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PriceModel::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Модель')
            ->setEntityLabelInPlural('Модели')
            ->setPaginatorPageSize(100)
            ->setSearchFields(['name', 'nameRus','code']);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            TextField::new('name_short', 'Короткое название для верхнего меню')->hideOnIndex(),
            TextField::new('nameRus', 'Название рус.'),
            TextField::new('code', 'Алиас'),
            AssociationField::new('priceBrand', 'Бренд')->setRequired(true),
            AssociationField::new('class', 'Нормо-час')->setRequired(true),
            NumberField::new('increase', 'Наценка'),
            ImageField::new('photo')->setUploadDir('/public/img/models/')->setBasePath('/img/models/'),
            ImageField::new('photo_big')->setUploadDir('/public/img/models/big/')->setBasePath('/img/models/big/'),
            DateTimeField::new('modify_date', 'Дата изменения')->hideOnIndex(),

        ];
    }

}
