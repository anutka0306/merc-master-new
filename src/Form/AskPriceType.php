<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\PriceModel;

class AskPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextareaType::class, [
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_textarea'],
                'attr' => ['placeholder' => 'Не работает, сколько стоит, сломался и т.д.']
            ])
            ->add('priceModel', EntityType::class, [
                'class' => PriceModel::class,
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'label' => ' ',
                'label_attr' => ['class' => 'uk-form-label'],
                'attr' => ['class' => '', 'placeholder' => 'Модель'],
            ])
            ->add('name', TextType::class,[
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'attr' => ['placeholder' => 'Имя']
            ])
            ->add('tel', TextType::class, [
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'attr' => ['placeholder' => '+7 (___) ___-__-__']
            ])
            ->add('email', EmailType::class, [
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => false,
                'attr' => ['placeholder' => 'Почта']
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
