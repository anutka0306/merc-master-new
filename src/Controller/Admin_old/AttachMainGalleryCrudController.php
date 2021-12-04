<?php

namespace App\Controller\Admin_old;

use App\Entity\AttachMainGallery;
use App\Form\AttachmentType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Intervention\Image\ImageManager;

class AttachMainGalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AttachMainGallery::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')->setUploadDir('/public/img/main-gallery/')->setBasePath('/img/main-gallery/'),

        ];
    }

}
