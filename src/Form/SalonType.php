<?php

namespace App\Form;

use App\Entity\Salon;
use App\Entity\City;
use App\Entity\District;
use App\Entity\SubwayStation;
use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Form\WorkingDayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SalonType extends AbstractType
{
    const STRIP_TAGS_FIELDS = [
        'name',
        'address',
        'workingHoursFrom',
        'workingHoursTo',
        'alias',
        'phone',
        'waPhone',
        'yandexTarget',
        'yandexMapLink',
        'yandexNavigatorLink',
        'googleMapLink',
        'slogan',
        'videoLink'
    ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Название',
            ])
            ->add('address', TextType::class, [
                'label' => 'Адрес',
            ])
            //->add('metro')
            ->add('workingHoursFrom', TextType::class, [
                'label' => 'Работает с',
            ])
            ->add('workingHoursTo', TextType::class, [
                'label' => 'Работает по',
            ])
            ->add('alias', TextType::class, [
                'label' => 'Псевдоним',
                'required' => false,
            ])
            ->add('phone', TextType::class, [
                'label' => 'Телефон',
            ])
            ->add('waPhone', TextType::class, [
                'label' => 'Телефон Whatsapp',
                'required' => false,
            ])
            ->add('yandexTarget', TextType::class, [
                'label' => 'Название события Yandex.Metrika',
                'required' => false,
            ])
            ->add('mangoId')
            ->add('yandexMapLink', TextareaType::class, [
                'label' => 'Ссылка на Яндекс.Карту',
                'required' => false,
            ])
            ->add('yandexNavigatorLink', TextareaType::class, [
                'label' => 'Ссылка на Яндекс.Навигатор',
                'required' => false,
            ])
            ->add('googleMapLink', TextareaType::class, [
                'label' => 'Ссылка на Google Map',
                'required' => false,
            ])
            ->add('slogan', TextType::class, [
                'label' => 'Слоган',
                'required' => false,
            ])
            ->add('text', CKEditorType::class, [
                'label' => 'Описание',
                'required' => false,
            ])
            ->add('videoLink', TextType::class, [
                'label' => 'Ссылка на видео',
                'required' => false,
            ])
            ->add('published', HiddenType::class, [
                'data' => 0,
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'label' => 'Город',
                'required' => false,
            ])
            ->add('districts', EntityType::class, [
                'class' => District::class,
                'choice_label' => 'name',
                'multiple'=>true,
                'required' => false,
                'label' => 'Районы обслуживания',
            ])
            ->add('subwayStations', EntityType::class, [
                'class' => SubwayStation::class,
                'choice_label' => 'name',
                'multiple'=>true,
                'required' => false,
                'label' => 'Станции метро',
            ])
            ->add('workingDays', CollectionType::class, [
                'entry_type' => WorkingDayType::class,
                'entry_options' => ['label' => false],
                'label' => 'Расписание',
                'allow_add' => true,
            ])
            ->add('modifyDate')
            ->add('avatarFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'Аватар',
                'allow_delete' => false,
                'download_uri' => false,
                'attr' => ['class' => 'form-control-file'],
            ])
            ->add('file', FileType::class, [
                'label' => 'Галерея салона',
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                //'attr' => ['class' => 'form-control-file'],
            ])
            ->add('excludedBrands', EntityType::class, [
                'class' => PriceBrand::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Исключить марки',
                'required' => false,
                'attr' => ['data-widget' => 'select2'],
            ])
            ->add('excludedModels', EntityType::class, [
                'class' => PriceModel::class,
                'choice_label' => 'brandModelName',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Исключить модели',
                'required' => false,
                'attr' => ['data-widget' => 'select2'],
            ])
            ->add('excludedServices', EntityType::class, [
                'class' => PriceService::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'label' => 'Исключить услуги',
                'attr' => ['data-widget' => 'select2'],
            ]);

        foreach (self::STRIP_TAGS_FIELDS as $field) {
            $builder->get($field)
                ->addModelTransformer(new CallbackTransformer(
                    function ($original) {
                        return $original;
                    },
                    function ($submitted) {
                        return strip_tags($submitted);
                    }
                ))
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salon::class,
        ]);
    }
}
