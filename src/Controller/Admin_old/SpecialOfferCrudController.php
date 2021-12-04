<?php

namespace App\Controller\Admin_old;

use App\Entity\SpecialOffer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpecialOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SpecialOffer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Акции')
            ->setEntityLabelInSingular('Акция')
            ->setPaginatorPageSize(20);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            TextField::new('description', 'Описание')->hideOnIndex(),
            NumberField::new('oldPrice', 'Старая цена'),
            NumberField::new('newPrice', 'Новая цена'),
            TextEditorField::new('text', 'Текст акции'),
            BooleanField::new('published', 'Активность'),
            NumberField::new('ordering','Позиция'),
            TextField::new('metaTitle','Title')->hideOnIndex(),
            TextEditorField::new('metaDescription', 'Description')->hideOnIndex(),
            TextField::new('slug', 'Алиас'),
            /*ImageField::new('image', 'Картинка акции')->setUploadDir('/public/img/offers/')->setBasePath('/img/offers/'),*/
            DateTimeField::new('modifyDate', 'Дата изменения')->hideOnIndex()
        ];
    }

}
