<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TrimExtension extends AbstractExtension
{
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('trim', [$this, 'trim'],['is_safe' => ['html']]),
        ];
    }
    
    /**
     * @param string $string
     * @param string $characters
     *
     * @return string
     */
    public function trim(string $string,string $characters = ' '):string
    {
        return trim($string,$characters);
    }
}
