<?php

namespace App\Twig;

use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
use App\Service\PriceListHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PriceListHelperExtension extends AbstractExtension
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
            new TwigFunction('is_detailing', [$this, 'is_detailing']),
            new TwigFunction('calc_price', [$this, 'calc_price']),
        ];
    }
    
    
    public function is_detailing(?Content $content):bool
    {
        if (null === $content) {
            return false;
        }
        return $this->price_list_helper->isDetailing($content);
    }
    
    public function calc_price(?PageInterface $content):?int
    {
        if (null === $content) {
            return null;
        }
        return $this->price_list_helper->getPrice($content);
    }
}
