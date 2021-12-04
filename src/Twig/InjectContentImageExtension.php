<?php

namespace App\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class InjectContentImageExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('inject_image', [$this, 'injectContentImage'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }

    public function injectContentImage(Environment $twig,$text,$folder,$placeholder,$images,$limit=0)
    {
        $images = explode('|',$images);
        $num_images = count($images);
        if (!$num_images) {
            return str_replace($placeholder,'',$text);
        }elseif ($num_images === 1){
            [$image,$title] = explode('<<<>>>',$images[0]);
            $gallery = $twig->render('extensions/inject_content_image.html.twig',compact('folder','title','image'));
        }else{
            $gallery = '';
            foreach ($images as $index => $single_image) {
                if ($limit > 0 && $index >= $limit) {
                    break;
                }
                [$image,$title] = explode('<<<>>>',$single_image);
                $gallery.= $twig->render('extensions/inject_content_image.html.twig',compact('folder','title','image'));
            }
        }
        return str_replace($placeholder,$gallery,$text);
    }
}
