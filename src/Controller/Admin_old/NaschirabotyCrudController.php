<?php

namespace App\Controller\Admin_old;

use App\Entity\AttachNashiraboty;
use App\Entity\Naschiraboty;

use App\Form\AttachmentNashiRabType;
use App\Form\GallayUploadType;
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
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Intervention\Image\File;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


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
            TextField::new('url', 'URL'),
            TextField::new('metaTitle')->hideOnIndex(),
            TextField::new('metaDescription')->hideOnIndex(),
            TextEditorField::new('text', 'Текст')->setFormType(GallayUploadType::class)->hideOnIndex(),
            NumberField::new('sum', 'Стоимость')->hideOnIndex(),
            NumberField::new('sort', 'Сортировка'),
            TextEditorField::new('shortText', 'Короткое описание')->hideOnIndex(),
            AssociationField::new('model'),
            AssociationField::new('service'),
            AssociationField::new('price_categoty'),
            ImageField::new('main_img', 'Картинка, которая отображается в блоке на разных страницах')->setHelp('.png, прозрачный фон, 640Х340')->setUploadDir('/public/img/nashiraboty_main/')->setBasePath('/img/nashiraboty_main/'),
            TextField::new('kuzov')->hideOnIndex(),
            TextField::new('year')->hideOnIndex(),
            Field::new('clientName', 'Имя клиента')->hideOnIndex(),
            DateTimeField::new('modifyDate')->hideOnIndex(),
            CollectionField::new('attach')
                ->setEntryType(AttachmentNashiRabType::class)
                ->onlyWhenUpdating()->setLabel('Здесь можно вставлять картинка-описание')->hideOnIndex(),
            ImageField::new('gallery')->setFormType(FileUploadType::class)
                ->setUploadDir('public/images/ourworks')
                ->setBasePath('public/images/ourworks')
                ->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]')
                ->setFormTypeOption('multiple', true)->setFormTypeOption('allow_delete', true)->setFormTypeOption('upload_delete', function(File $file) {$file = '';})->setLabel('Галерея под текстом')->hideOnIndex(),
            ImageField::new('blog_img', 'Картика, которая отображется на странице блога')->setBasePath('/img/nashiraboty_small/')->setUploadDir('/public/img/nashiraboty_small/')->setHelp('Предпочтительные размеры: 235 Х 140 px'),
        ];
    }

}
?>

