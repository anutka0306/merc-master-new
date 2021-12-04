<?php

namespace App\Form;

use App\Entity\District;
use App\Entity\SubwayStation;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SalonFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['priceBrand']) {
            $builder
                ->add('priceModel', EntityType::class, [
                    'class' => PriceModel::class,
                    'query_builder' => function (EntityRepository $er) use ($options) {
                        return $er->createQueryBuilder('u')
                            ->andWhere('u.priceBrand = :val')
                            ->setParameter('val', $options['priceBrand']);
                    },
                    'required' => false,
                    'label' => 'Модель',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('priceService', EntityType::class, [
                    'class' => PriceService::class,
                    'required' => false,
                    'label' => 'Услуга',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('district', EntityType::class, [
                    'class' => District::class,
                    'required' => false,
                    'label' => 'Район',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('subwayStation', EntityType::class, [
                    'class' => SubwayStation::class,
                    'required' => false,
                    'label' => 'Метро',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Найти',
                    'attr' => ['class' => 'uk-button uk-button-default uk-margin-small-bottom'],
                ]);
        } else {
            $builder
                ->add('priceBrand', EntityType::class, [
                    'class' => PriceBrand::class,
                    'required' => false,
                    'label' => 'Бренд',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('priceModel', EntityType::class, [
                    'class' => PriceModel::class,
                    'required' => false,
                    'label' => 'Модель',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('priceService', EntityType::class, [
                    'class' => PriceService::class,
                    'required' => false,
                    'label' => 'Услуга',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('district', EntityType::class, [
                    'class' => District::class,
                    'required' => false,
                    'label' => 'Район',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('subwayStation', EntityType::class, [
                    'class' => SubwayStation::class,
                    'required' => false,
                    'label' => 'Метро',
                    'label_attr' => ['class' => 'uk-form-label'],
                    'attr' => ['class' => 'uk-select'],
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Найти',
                    'attr' => ['class' => 'uk-button uk-button-default uk-margin-small-bottom'],
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'priceBrand' => null,
        ]);
    }
}
