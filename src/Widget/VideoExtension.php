<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\VideoService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VideoExtension extends AbstractExtension
{
    
    /**
     * @var VideoService
     */
    protected $video_service;
    
    public function __construct(VideoService $video_service)
    {
    
        $this->video_service = $video_service;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('video', [$this, 'video'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function video(Environment $twig, PageInterface $page): string
    {
        $items = $this->video_service->getItems($page);
        if ( ! $items) {
            return '';
        }
        return $twig->render('widget/videos.html.twig', compact('items'));
    }
}
