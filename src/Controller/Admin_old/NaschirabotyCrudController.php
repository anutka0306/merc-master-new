<?php

namespace App\Controller\Admin_old;

use App\Entity\AttachNashiraboty;
use App\Entity\Naschiraboty;

use App\Form\AttachmentNashiRabType;
use App\Form\ImagesDownloadType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Configurator\TextEditorConfigurator;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Intervention\Image\File;


class NaschirabotyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Naschiraboty::class;
    }

   public function configureCrud(Crud $crud): Crud
   {
       return $crud->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
   }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Название'),
            TextField::new('metaTitle'),
            TextField::new('metaDescription'),
            TextEditorField::new('text', 'Текст'),
            NumberField::new('sum', 'Стоимость'),
            NumberField::new('sort', 'Сортировка'),
            TextEditorField::new('shortText', 'Короткое описание'),
            AssociationField::new('model'),
            AssociationField::new('service'),
            ImageField::new('main_img', 'Картинка, которая отображается в блоке на разных страницах')->setHelp('.png, прозрачный фон, 640Х340')->setUploadDir('/public/img/nashiraboty_main/')->setBasePath('/img/nashiraboty_main/'),
            TextField::new('kuzov'),
            TextField::new('year'),
            Field::new('clientName', 'Имя клиента'),
            DateTimeField::new('modifyDate'),
            CollectionField::new('attach')
                ->setEntryType(AttachmentNashiRabType::class)
                ->onlyWhenUpdating()->setLabel('Здесь можно вставлять картинка-описание')->hideOnIndex(),
            ImageField::new('gallery')
                ->setUploadDir('public/images/ourworks')
                ->setBasePath('public/images/ourworks')
                ->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]')
                ->setFormTypeOption('multiple', true)->setLabel('Галерея под текстом')->hideOnIndex(),
            ImageField::new('blog_img', 'Картика, которая отображется на странице блога')->setBasePath('/img/nashiraboty_small/')->setUploadDir('/public/img/nashiraboty_small/')->setHelp('Предпочтительные размеры: 235 Х 140 px'),
        ];
    }

}
