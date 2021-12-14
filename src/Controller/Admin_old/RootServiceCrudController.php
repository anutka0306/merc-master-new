<?php

namespace App\Controller\Admin_old;

use App\Entity\RootService;
use App\Form\GallayUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Intervention\Image\File;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


class RootServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RootService::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Услуги')
            ->setEntityLabelInSingular('Услуга')
            ->setPaginatorPageSize(100)->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            TextField::new('path', 'Алиас'),
            TextField::new('name','Название'),
            TextField::new('h1', 'H1'),
            ImageField::new('pageIcon', 'Иконка страницы')->setUploadDir('/public/images/page-icons')->setBasePath('/images/page-icons/'),
            AssociationField::new('service', 'Услуга прайса'),
            AssociationField::new('price_category', 'Категория услуги')->hideOnIndex(),
            //Подгружает
            AssociationField::new('parent', 'Родитель')->hideOnIndex(),
            TextField::new('meta_title', 'Title')->hideOnIndex(),
            CodeEditorField::new('meta_description','Description')->hideOnIndex(),
            TextEditorField::new('text', 'Текст')->setFormType(GallayUploadType::class)->hideOnIndex(),
            ImageField::new('text_img', 'Картинка текста (верхнего)')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            ImageField::new('text_down_bg', 'Фоновое изображение нижнего блока текста')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down', 'Текст нижний')->hideOnIndex(),
            ImageField::new('text_down_img', 'Картинка нижнего блока')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down2', 'Текст нижний 2-ой блок')->hideOnIndex(),
            ImageField::new('text_down_img2', 'Картинка нижнего блока2')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            ImageField::new('adv_icon1', 'Картинка преимуществ 1')->setUploadDir('/public/images/advantages_icons')->setBasePath('/images/advantages_icons/')->hideOnIndex(),
            TextField::new('adv_text1', 'Описание преимущества 1')->hideOnIndex(),
            ImageField::new('adv_icon2', 'Картинка преимуществ 2')->setUploadDir('/public/images/advantages_icons')->setBasePath('/images/advantages_icons/')->hideOnIndex(),
            TextField::new('adv_text2', 'Описание преимущества 2')->hideOnIndex(),
            ImageField::new('adv_icon3', 'Картинка преимуществ 3')->setUploadDir('/public/images/advantages_icons')->setBasePath('/images/advantages_icons/')->hideOnIndex(),
            TextField::new('adv_text3', 'Описание преимущества 3')->hideOnIndex(),
            ImageField::new('adv_icon4', 'Картинка преимуществ 4')->setUploadDir('/public/images/advantages_icons')->setBasePath('/images/advantages_icons/')->hideOnIndex(),
            TextField::new('adv_text4', 'Описание преимущества 4')->hideOnIndex(),
            BooleanField::new('published', 'Активно'),
            NumberField::new('rating_value', 'Рейтинг')->hideOnIndex(),
            NumberField::new('rating_count', 'Кол-во голосов')->hideOnIndex(),
            DateTimeField::new('modify_date', 'Дата обновления')->hideOnIndex(),
        ];
    }

}
