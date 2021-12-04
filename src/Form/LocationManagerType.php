<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LocationManagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('showBrandLocation', CheckboxType::class, [
                'label' => 'Включить страницы брендов',
                'required' => false,
                'data' => $options['isShowBrands']
            ])
            ->add('showModelLocation', CheckboxType::class, [
                'label' => 'Включить страницы моделей',
                'required' => false,
                'data' => $options['isShowModels']
            ])
            ->add('showRootServiceLocation', CheckboxType::class, [
                'label' => 'Включить страницы общих услуг',
                'required' => false,
                'data' => $options['isShowRootServices']
            ])
            ->add('showBrandServiceLocation', CheckboxType::class, [
                'label' => 'Включить страницы услуг брендов',
                'required' => false,
                'data' => $options['isShowBrandServices']
            ])
            ->add('showModelServiceLocation', CheckboxType::class, [
                'label' => 'Включить страницы услуг моделей',
                'required' => false,
                'data' => $options['isShowModelServices']
            ])
            ->add('save', SubmitType::class, ['label' => 'Сохранить']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'isShowBrands' => false,
            'isShowModels' => false,
            'isShowBrandServices' => false,
            'isShowModelServices' => false,
            'isShowRootServices' => false,
        ]);
    }
}
