<?php

namespace App\Form;

use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Model\PageGeneratorModel;
use App\Service\ConfigService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageGeneratorType extends AbstractType
{
    private $seo;

    public function __construct(ConfigService $config_service)
    {
        $this->seo = $config_service->getGroup('seo');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brands', EntityType::class, [
                'class' => PriceBrand::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'label' => 'Марки',
                'required' => false,
                'attr' => ['data-widget' => 'select2'],
            ])
            ->add('models', EntityType::class, [
                'class' => PriceModel::class,
                'choice_label' => 'brandModelName',
                'multiple' => true,
                'expanded' => false,
                'label' => 'Модели',
                'required' => false,
                'attr' => ['data-widget' => 'select2'],
            ])
            ->add('service', EntityType::class, [
                'class' => PriceService::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'label' => 'Услуга',
                'attr' => ['data-widget' => 'select2'],
            ])
            ->add('h1', TextType::class, [
                'label' => 'H1',
                'data' => $this->seo['h1'] ?? '',
            ])
            ->add('metaDescription', TextareaType::class, [
                'label' => 'Мета-описание',
                'data' => $this->seo['description'] ?? '',
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Текст',
            ])
            ->add('urlRegenerate', ChoiceType::class, [
                'label' => 'Перегенерировать ссылки',
                'choices' => array_flip(PageGeneratorModel::URL_REGENERATE_CHOICES),
                'required' => true,
                'expanded' => false,
                'multiple' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PageGeneratorModel::class,
        ]);
    }
}
