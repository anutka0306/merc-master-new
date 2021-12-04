<?php

namespace App\Form;

use App\Entity\WorkingDay;
use App\Entity\DayOfWeek;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkingDayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('dayOfWeek', HiddenType::class)
            //->add('getDayOfWeekName', TextType::class, [
            //    'disabled' => true,
            //    'label' => 'День недели',
            //])
            ->add('dayOfWeek', EntityType::class, [
                'class' => DayOfWeek::class,
                'disabled' => true,
                'label' => 'День недели',
                'required' => false,
            ])
            ->add('workingHoursFrom', TextType::class, [
                'label' => 'Работает с',
                'required' => false,
            ])
            ->add('workingHoursTo', TextType::class, [
                'label' => 'Работает по',
                'required' => false,
            ])
            ->add('dayOff', CheckboxType::class, [
                'label'    => 'Выходной',
                'required' => false,
            ]);

        $builder->get('workingHoursFrom')
            ->addModelTransformer(new CallbackTransformer(
                function ($original) {
                    return $original;
                },
                function ($submitted) {
                    return strip_tags($submitted);
                }
            ))
        ;
        $builder->get('workingHoursTo')
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WorkingDay::class,
        ]);
    }
}
