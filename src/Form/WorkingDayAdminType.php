<?php

namespace App\Form;

use App\Entity\WorkingDay;
use App\Entity\DayOfWeek;
use App\Entity\Salon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkingDayAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salon', EntityType::class, [
                'class' => Salon::class,
                'label' => 'Выбать текущий салон из списка',
                'required' => false,
            ])
            ->add('dayOfWeek', EntityType::class, [
                'class' => DayOfWeek::class,
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WorkingDay::class,
        ]);
    }
}
