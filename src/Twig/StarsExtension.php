<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StarsExtension extends AbstractExtension
{
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('stars', [$this, 'renderStars'],['is_safe' => ['html']]),
        ];
    }

    public function renderStars(float $value,int $max=5):string
    {
        $html = '<div class="stars">';
        for ($i=1;$i<=$max;$i++){
            $fill_class = '';
            if ($i <= $value ) {
                $fill_class = 'on';
            }
            elseif ($i > $value && $i-1 < $value){
                $fill_class = 'half';
            }
            
            $html .='<span class="star '.$fill_class.'"></span>';
        }
        $html .='</div>';
        return $html;
    }
}
