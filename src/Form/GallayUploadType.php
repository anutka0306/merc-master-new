<?php

namespace App\Form;

use App\Entity\Naschiraboty;
use FOS\CKEditorBundle\Config\CKEditorConfiguration;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class GallayUploadType extends AbstractType
{
   /* public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', CKEditorType::class, [
                'config' => [
                    'uiColor' => '#e2e2e2',
                    'toolbar' => 'full',
                    'required'=> true,
                    'filebrowserBrowseRoute' => 'elfinder',
                    'filebrowserBrowseRouteParameters' => array(
                'instance' => 'default',
                'homeFolder' => ''
                    ),
                    'filebrowserImageBrowseUrl' => 'elfinder',
                    'filebrowserImageBrowseLinkUrl' => 'elfinder',
                    'filebrowserBrowseUrl' => 'elfinder'

               ]

            ])
        ;
    }*/
    public function getParent(){
        return CKEditorType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}


