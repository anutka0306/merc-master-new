<?php

namespace App\Twig;

use App\Entity\Contracts\PageInterface;
use App\Entity\Salon;
use App\Service\SalonManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SalonExtension extends AbstractExtension
{
    /**
     * @var SalonManager
     */
    private $salonManager;

    public function __construct(SalonManager $salonManager)
    {
        $this->salonManager = $salonManager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('salons', [$this, 'salons']),
        ];
    }

    /**
     * @param PageInterface|null $page
     * @return array|Salon[]
     */
    public function salons(?PageInterface $page):array
    {
        return $this->salonManager->getSalonsByPage($page);
    }
}
