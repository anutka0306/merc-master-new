<?php

namespace App\Controller\Admin_old;

use App\Entity\Brand;
use App\Entity\Content;
use App\Entity\PriceBrand;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
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
use Doctrine\ORM\EntityManager;



class BrandCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Brand::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Марка')
            ->setEntityLabelInPlural('Марки')
            ->setSearchFields(['id','brand_id','path','name'])
            ->setDefaultSort(['path'=>'ASC'])
            ->setPaginatorPageSize(100);
    }




    public function configureFields(string $pageName): iterable
    {
        $parents = $this->getDoctrine()->getManager()->getRepository(Content::class)->findBy(['published' => '1']);
        $pages = array();
        if(isset($_GET['entityId'])){
            $pages = $this->getDoctrine()->getManager()->getRepository(Content::class)->findBy(['parent' => $_GET['entityId']]);
        }



        return [
            Field::new('id','ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            TextField::new('path','URL'),
            IntegerField::new('brand_id', 'ID Марки')->setRequired(true),
            TextField::new('h1', 'H1'),
            ImageField::new('pageIcon', 'Иконка страницы')->setUploadDir('/public/images/page-icons')->setBasePath('/images/page-icons/'),
            TextField::new('meta_title', 'Title')->hideOnIndex(),
            CodeEditorField::new('meta_description', 'Description')->hideOnIndex(),
            CodeEditorField::new('text', 'Текст')->hideOnIndex(),
            ImageField::new('text_img', 'Картинка текста (верхнего)')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down', 'Текст нижний')->hideOnIndex(),
            ImageField::new('text_down_img', 'Картинка нижнего блока')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            CodeEditorField::new('text_down2', 'Текст нижний 2-ой блок')->hideOnIndex(),
            ImageField::new('text_down_img2', 'Картинка нижнего блока2')->setUploadDir('/public/images/page-images')->setBasePath('/images/page-images/')->hideOnIndex(),
            BooleanField::new('published', 'Опубликовано'),
            NumberField::new('rating_value', 'Рейтинг')->hideOnIndex(),
            NumberField::new('rating_count', 'Кол-во голосов')->hideOnIndex(),
            DateTimeField::new('modify_date', 'Дата обновления')->hideOnIndex(),

            AssociationField::new('pages', 'Услуги')->setFormTypeOption('choices', $pages)->onlyWhenUpdating(),
            AssociationField::new('pages', 'Услуги')->onlyOnIndex(),
            AssociationField::new('parent')->setFormTypeOption('choices', [$parents] )->setHelp('Ремонт коробки передач в Санкт-Петербурге'),

        ];
    }

}
