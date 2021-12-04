<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\BeforeAfterService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BeforeAfterExtension extends AbstractExtension
{
    
    /**
     * @var BeforeAfterService
     */
    protected $before_after_service;
    
    public function __construct(BeforeAfterService $before_after_service)
    {
    
        $this->before_after_service = $before_after_service;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('before_after', [$this, 'before_after'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function before_after(Environment $twig, PageInterface $page): string
    {
        $items = $this->before_after_service->getItems($page);
        return $twig->render('v2/widget/before_after.html.twig', compact('items'));
    }
}
