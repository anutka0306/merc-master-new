<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\SchemaBreadcrumbsService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SchemaBreadcrumbs extends AbstractExtension
{
    
    /**
     * @var SchemaBreadcrumbsService
     */
    protected $breadcrumbs;
    
    public function __construct(SchemaBreadcrumbsService $breadcrumbs)
    {
    
        $this->breadcrumbs = $breadcrumbs;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('schema_breadcrumbs', [$this, 'render'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }

    public function render(Environment $twig, PageInterface $page)
    {
        $data = $this->breadcrumbs->getSchema($page);
        if (empty($data)) {
            return '';
        }
        try {
            return $twig->render('widget/schema_breadcrumbs.html.twig', [
                'data' => json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK)
            ]);
        } catch (\Throwable $e) {
            return '';
        }
    }
}
