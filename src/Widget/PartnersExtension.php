<?php


namespace App\Widget;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\PartnersRepository;

class PartnersExtension extends AbstractExtension
{
    /**
     * @var PartnersRepository
     */
    protected $partnersRepository;

    public function __construct(PartnersRepository $partnersRepository){
        $this->partnersRepository = $partnersRepository;
    }

    public function getFunctions():array
    {
        return [
            new TwigFunction('partners_index', [$this, 'partners_index'], ['needs_environment'=> true, 'is_safe' => ['html']]),
        ];
    }

    public function partners_index(Environment $twig):string{
        $items = $this->partnersRepository->findAll();
        return $twig->render('v2/widget/partners_index.html.twig', compact('items'));
    }
}