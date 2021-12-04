<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\PriceListHelper;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WhyUsExtension extends AbstractExtension
{
    /**
     * @var PriceListHelper
     */
    protected $price_list_helper;
    
    public function __construct(PriceListHelper $price_list_helper)
    {
        $this->price_list_helper = $price_list_helper;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('why_us', [$this, 'why_us'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function why_us(Environment $twig, PageInterface $page): string
    {
        $location               = '3 автосервиса в разных округах Москвы';
        $experience             = '<span>Опытные мастера.</span><br> Стаж более десяти лет';
        $root_category_text_map = [
            'Покраска кузова' => 'по покраске кузова',
            'Кузовной ремонт' => 'по кузовному ремонту',
            'Детейлинг'       => 'по детейлингу',
            'Ремонт стекол'   => 'по ремонту стекол',
        ];
        $brand_model            = '';
        if ($page->getBrandName()) {
            $location = '3 автосервиса ' . $page->getBrandName();
        }
        $root_category = $this->price_list_helper->getRootCategory($page);
        if ($root_category) {
            if ($experience_text = @$root_category_text_map[$root_category->getName()]) {
                $experience = '<span>Огромный опыт</span><br>' . $experience_text;
                if ($page->getBrandAndModelName()) {
                    $experience .= ' ' . $page->getBrandAndModelName();
                }
            }
            
        } elseif ($page->getBrandAndModelName()) {//Страница кузовных работ. Категория не указана
            $experience = '<span>Огромный опыт</span><br> по ремонту кузова ' . $page->getBrandAndModelName();
        }
        
        return $twig->render('widget/why_us.html.twig', compact('experience', 'location'));
    }
}
