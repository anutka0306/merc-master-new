<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\PriceListHelper;
use App\Service\SalonManager;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MapExtension extends AbstractExtension
{
    
    /**
     * @var PriceListHelper
     */
    protected $price_list_helper;
    /**
     * @var SalonManager
     */
    private $salonManager;

    public function __construct(PriceListHelper $price_list_helper, SalonManager $salonManager)
    {
        $this->price_list_helper = $price_list_helper;
        $this->salonManager = $salonManager;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_map', [$this, 'render_map'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function render_map(Environment $twig, ?PageInterface $page)
    {
        $salons = $this->salonManager->getSalonsByPage($page);
        return $twig->render('v2/widget/map.html.twig', compact('salons'));
    }
}
