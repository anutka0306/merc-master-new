<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Service\ConfigService;
use App\Service\SalonManager;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WhatsappExtension extends AbstractExtension
{
    /**
     * @var ConfigService
     */
    protected $config;
    /**
     * @var SalonManager
     */
    private $salonManager;

    public function __construct(ConfigService $config, SalonManager $salonManager)
    {
        $this->config = $config;
        $this->salonManager = $salonManager;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('whatsapp_button', [$this, 'button'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('whatsapp_block', [$this, 'block'],['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    /**
     * @param Environment $twig
     * @param PageInterface|null $page
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function button(Environment $twig, ?PageInterface $page)
    {
        $salons = $this->salonManager->getSalonsByPage($page);
        $text  = $this->config->getCached('whatsapp.text');
        $text  = urlencode($text);
        $items = [];
        foreach ($salons as $salon) {
            $items[] = [
                'link' => 'https://wa.me/' . $salon->getWaPhone() . '?text=' . $text,
                'name' => $salon->getName(),
            ];
        }
        
        return $twig->render('widget/whatsapp_button.html.twig', compact('items'));
    }

    /**
     * @param Environment $twig
     * @param PageInterface|null $page
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function block(Environment $twig, ?PageInterface $page)
    {
        $salons = $this->salonManager->getSalonsByPage($page);

        $brand_model = (null!== $page && $page->getBrandAndModelName())?:'авто';
        $text  = $this->config->getCached('whatsapp.text');
        $text  = urlencode($text);
        $items = [];
        foreach ($salons as $salon) {
            $items[] = [
                'link' => 'https://wa.me/' . $salon->getWaPhone() . '?text=' . $text,
                'name' => $salon->getName(),
            ];
        }
        
        return $twig->render('v2/extensions/whatsapp.html.twig', compact('items','brand_model'));
    }
}
