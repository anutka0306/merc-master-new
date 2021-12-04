<?php

namespace App\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Entity\ServiceEntityReedInterface;

class ContentExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('remove_gallery', [$this, 'removeGallery'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('seo_block', [$this, 'seoBlock'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('turbo_text', [$this, 'turboText'],['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }

    public function removeGallery($html)
    {
        $html = str_replace('[galer_vik_1]', '', $html);
        return preg_replace('/<div class="foto_gallery_jvjcjv">\s*<div>[\s\S]+?<\/div>\s*<\/div>/', '', $html);
    }

    public function seoBlock(Environment $twig, $text)
    {
        if (empty($text)) {
            return '';
        }
        $hidden_text = '';
        $text = $this->removeGallery($text);
        $text = str_replace(['<h1', '</h1'], ['<h2', '</h2'], $text);

        $paragraphs = preg_split('#(<p>[\s\S]+?</p>\s*)#', $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        if (count($paragraphs) < 3) {
            $visible_text = $text;
        } else {
            $visible_text = array_shift($paragraphs) . array_shift($paragraphs);
            $hidden_text = implode('', $paragraphs);
        }

        return $twig->render('v2/extensions/seo.html.twig', compact('visible_text', 'hidden_text'));
    }
    
    public function turboText(Environment $twig, ServiceEntityReedInterface $page)
    {
        $text = $page->getText();
        return $twig->render('v2/turbo/service/text.html.twig',compact('text'));
    }
}
