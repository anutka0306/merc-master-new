<?php

namespace App\Widget;

use App\Repository\SpecialOfferRepository;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SpecialOffersExtension extends AbstractExtension
{
    
    /**
     * @var SpecialOfferRepository
     */
    protected $special_offer_repository;
    
    public function __construct(SpecialOfferRepository $special_offer_repository)
    {
    
        $this->special_offer_repository = $special_offer_repository;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('special_offers', [$this, 'special_offers'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }


    public function special_offers(Environment $twig,string $brand_model_name):string
    {
        $items = $this->special_offer_repository->findBy(['published'=>true],['ordering'=>'asc']);
        foreach ($items as $item) {
            $item->setName(str_replace('BRAND',$brand_model_name,$item->getName()));
            $item->setDescription(str_replace('BRAND',$brand_model_name,$item->getDescription()));
        }
        return $twig->render('v2/widget/special_offers.html.twig',compact('items'));
    }
    
}
