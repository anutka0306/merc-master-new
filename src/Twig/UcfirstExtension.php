<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UcfirstExtension extends AbstractExtension
{
    
    public function getFilters(): array
    {
        return [
            new TwigFilter('ucfirst', [$this, 'ucfirst'],['is_safe' => ['html']]),
        ];
    }
    
    /**
     * @param string $string
     *
     * @return string
     */
    public function ucfirst(string $string):string
    {
        return mb_strtoupper(mb_substr($string, 0, 1,'utf-8')) . mb_substr($string, 1,null,'utf-8');
    }
}
