<?php

namespace App\Controller\Admin_old;

use App\Entity\PriceCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PriceCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PriceCategory::class;
    }

    //Здесь подумать - добавление в 2 теблицы
    /*public function configureActions(Actions $actions): Actions
    {
        $newAction = Action::new('Add all')
            ->linkToCrudAction('addAll');
        return $actions
            ->addBatchAction(Crud::PAGE_NEW, $newAction);
    }

    public function addAll(AdminContext $context)
    {

    }*/

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Категрии')
            ->setEntityLabelInSingular('Категория')
            ->setPaginatorPageSize(100)
            ->setSearchFields(['name']);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id','ID')->onlyOnIndex(),
            TextField::new('name', 'Название'),
            /*NumberField::new('parent', 'Родитель'),*/
            TextField::new('slug', 'Алиас'),
            ImageField::new('image', 'Картинка для блока меню (на внутренних)')->setUploadDir('/public/images/category_images')->setBasePath('/images/category_images/')->hideOnIndex()
        ];
    }

}
