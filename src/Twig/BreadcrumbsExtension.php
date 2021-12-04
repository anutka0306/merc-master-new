<?php

namespace App\Twig;

use App\Entity\Contracts\PageInterface;
use App\Service\BreadcrumbsService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension
{
    
    /**
     * @var BreadcrumbsService
     */
    protected $breadcrumbs_service;
    
    public function __construct(BreadcrumbsService $breadcrumbs_service)
    {
    
        $this->breadcrumbs_service = $breadcrumbs_service;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('breadcrumbs', [$this, 'breadcrumbs'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }
    
    
    public function breadcrumbs(Environment $twig, PageInterface $page, string $current_name = null):string
    {
        if (is_null($page)) {
            return '';
        }
        $items = $this->breadcrumbs_service->getItems($page, $current_name);
        if (count($items) < 1) {
            return '';
        }
        return $twig->render('v2/extensions/breadcrumbs.html.twig', compact('items', 'page'));
    }
    
}
