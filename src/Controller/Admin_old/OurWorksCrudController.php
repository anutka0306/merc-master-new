<?php

namespace App\Controller\Admin_old;

use App\Entity\OurWorks;
use App\Form\AttachmentType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Intervention\Image\ImageManager;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OurWorksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OurWorks::class;
    }

public function configureActions(Actions $actions): Actions
{
    return $actions->add(Crud::PAGE_NEW, Action::SAVE_AND_CONTINUE)
        ->update(Crud::PAGE_NEW, Action::SAVE_AND_CONTINUE, function (Action $action) {
            return $action->setIcon('fa fa-file-alt')->setLabel('Сохранить и загрузить картинки');
        });
}

    public function configureFields(string $pageName): iterable
    {

       $entityId = null;
       if(isset($_GET['entityId'])){
           $entityId = $_GET['entityId'];
       }
        $fields = [
            AssociationField::new('priceModel')->setRequired(true),
            AssociationField::new('priceServices'),
            CollectionField::new('attachments')
                ->setEntryType(AttachmentType::class)
            ->onlyWhenUpdating(),
        ];


        return $fields;
    }

}
