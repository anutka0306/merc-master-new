<?php

namespace App\Widget;

use App\Service\ConfigService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class OrderFormExtension extends AbstractExtension
{
    /**
     * @var ConfigService
     */
    protected $config;
    
    public function __construct(ConfigService $config)
    {
        $this->config = $config;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('order_form', [$this, 'order_form'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function order_form(Environment $twig)
    {
        $text  = $this->config->get('whatsapp.text');
        $text  = urlencode($text);
        $phone   = $this->config->get('whatsapp.phone.sev');
        $whatsapp_link = 'https://wa.me/' . $phone . '?text=' . $text;
        
        return $twig->render('widget/order_form.html.twig', compact('whatsapp_link'));
    }
}
