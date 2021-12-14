<?php

namespace App\Controller\Admin_old;

use App\Entity\Simple;
use App\Form\GallayUploadType;
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

class SimpleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Simple::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Инфо страница')
            ->setEntityLabelInSingular('Инфо страницы')
            ->setPaginatorPageSize(100)->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id', 'ID')->onlyOnIndex(),
            TextField::new('path', 'Алиас'),
            TextField::new('name','Название'),
            TextField::new('h1', 'H2'),
            ImageField::new('pageIcon', 'Иконка страницы')->setUploadDir('/public/images/page-icons')->setBasePath('/images/page-icons/'),
            //Подгружает
            AssociationField::new('parent', 'Родитель')->hideOnIndex(),
            TextField::new('meta_title', 'Title')->hideOnIndex(),
            TextEditorField::new('meta_description','Description')->hideOnIndex(),
            TextEditorField::new('text', 'Текст')->setFormType(GallayUploadType::class)->hideOnIndex(),
           /* ImageField::new('text_img', 'Картинка текста (верхнего)')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            ImageField::new('text_down_bg', 'Фоновое изображение нижнего блока текста')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down', 'Текст нижний')->hideOnIndex(),
            ImageField::new('text_down_img', 'Картинка нижнего блока')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down2', 'Текст нижний 2-ой блок')->hideOnIndex(),
            ImageField::new('text_down_img2', 'Картинка нижнего блока2')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down3', 'Текст нижний 3-ий блок')->hideOnIndex(),
            ImageField::new('text_down_img3', 'Картинка нижнего блока3')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down4', 'Текст нижний 4-ый блок')->hideOnIndex(),
            ImageField::new('text_down_img4', 'Картинка нижнего блока4')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),*/
            BooleanField::new('published', 'Активно'),
            NumberField::new('rating_value', 'Рейтинг')->hideOnIndex(),
            NumberField::new('rating_count', 'Кол-во голосов')->hideOnIndex(),
            DateTimeField::new('modify_date', 'Дата обновления')->hideOnIndex(),
        ];
    }

}
