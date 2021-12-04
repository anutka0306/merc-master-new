<?php

namespace App\Twig;

use App\Dto\ServiceMenuItemDto;
use App\Entity\Contracts\PageInterface;
use App\Service\RootServiceManager;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MenuExtension extends AbstractExtension
{

    /**
     * @var RootServiceManager
     */
    private $rootServiceManager;

    /**
     * @var AdapterInterface
     */
    protected $cache;

    public function __construct(RootServiceManager $rootServiceManager, AdapterInterface $cache)
    {

        $this->rootServiceManager = $rootServiceManager;
        $this->cache = $cache;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('main_menu', [$this, 'mainMenu'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('offcanvas', [$this, 'offcanvas'], ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }


    public function mainMenu(Environment $twig): string
    {
        $item = $this->cache->getItem('main_menu');
        //потом вернуть ! и разобраться с кэшем
        if (!$item->isHit()) {//если данное значение не закешировано
            $items = $this->getServiceMenuItems();

            $html = $twig->render('v2/extensions/mainmenu.html.twig',[
                'items' => $items
            ]);
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }


    public function offcanvas(Environment $twig,?PageInterface $page): string
    {
        $item = $this->cache->getItem('offcanvas');
        if (!$item->isHit()) {//если данное значение не закешировано
            $items = $this->getServiceMenuItems();

            $html = $twig->render('v2/extensions/offcanvas.html.twig',[
                'items' => $items,
                'page' => $page,
            ]);
            
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    /**
     * @return array
     */
    protected function getServiceMenuItems(): array
    {
        $items = [];
        $rootCategories = [
            2 => 'Покраска кузова',
            3 => 'Кузовной ремонт',
            4 => 'Ремонт автостекол',
            5 => 'Детейлинг'
        ];
        $rootLinks = [
            2 => '/paint/',
            3 => '/body_works/',
            4 => '/repair_glass/',
            5 => '/detailing/'
        ];
        foreach ($rootCategories as $rootCategoryId => $rootCategoryName) {
            $items[] = new ServiceMenuItemDto(
                $rootCategoryName,
                $this->rootServiceManager->getRootServicePagesOfPriceCategory($rootCategoryId),
                $rootLinks[$rootCategoryId]
            );
        }
        return $items;
    }

}
