<?php

namespace App\Controller\Admin_old;

use App\Entity\PriceBrand;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;


class PriceBrandCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PriceBrand::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInSingular('Марка')
        ->setEntityLabelInPlural('Марки')
        ->setSearchFields(['id','name','nameRus','code'])
        ->setPaginatorPageSize(100);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            AssociationField::new('class','Нормо-час'),
            NumberField::new('increase', 'Наценка'),
            TextField::new('nameRus', 'Название рус.'),
            TextField::new('code', 'Алиас'),
            ImageField::new('photo')->setUploadDir('/public/img/brands/')->setBasePath('/img/brands/'),
            ImageField::new('photo_big')->setUploadDir('/public/img/brands/big/')->setBasePath('/img/brands/big/'),
            ImageField::new('img_logo')->setUploadDir('/public/img/brands/logo/')->setBasePath('/img/brands/logo/'),
            ImageField::new('about_img', 'Картинка для блока О компании в цифрах')->setUploadDir('/public/img/brands/about/')->setBasePath('/img/brands/about/')->hideOnIndex()->setHelp('Рекомендуемые размеры: 500 X 500, квадратное изображение'),
            ImageField::new('utp_img', 'Картинка для УТП блока')->setUploadDir('/public/img/brands/utp/')->setBasePath('/img/brands/utp/')->hideOnIndex()->setHelp('Рекомендуемые размеры: 676 X 666, либо квадратное'),
            DateTimeField::new('modifyDate', 'Дата изменения')->hideOnIndex(),
            TextField::new('phone', 'Телефон автосервиса')->hideOnIndex(),
            TextField::new('address', 'Адрес автосервиса')->hideOnIndex(),
            CodeEditorField::new('map', 'Код карты сервиса')->hideOnIndex(),
            TextField::new('phone2', 'Телефон автосервиса 2')->hideOnIndex(),
            TextField::new('address2', 'Адрес автосервиса 2')->hideOnIndex(),
            CodeEditorField::new('map2', 'Код карты сервиса 2')->hideOnIndex(),
        ];
    }

}
