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

class AskCollectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('detail', TextType::class,[
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'attr' => ['placeholder' => 'Название или номер детали']
            ])
            ->add('tel', TextType::class, [
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'attr' => ['placeholder' => '+7 (___) ___-__-__']
            ])
            ->add('name', TextType::class,[
                'label' => ' ',
                'row_attr' => ['class' => 'askForm_input'],
                'required' => true,
                'attr' => ['placeholder' => 'Имя']
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
