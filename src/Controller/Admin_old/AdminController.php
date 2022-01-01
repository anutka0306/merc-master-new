<?php

namespace App\Controller\Admin_old;

use App\Entity\AttachMainGallery;
use App\Entity\Brand;
use App\Entity\Config;
use App\Entity\MenuLeft;
use App\Entity\MenuTop;
use App\Entity\Model;
use App\Entity\Naschiraboty;
use App\Entity\OurWorks;
use App\Entity\Partners;
use App\Entity\PriceBrand;
use App\Entity\PriceCategory;
use App\Entity\PriceClass;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\Simple;
use App\Entity\SpecialOffer;
use App\Entity\Video;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(PriceBrandCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PikSP.ru');
    }

    public function configureMenuItems(): iterable
    {
        return[
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            MenuItem::subMenu('Меню', 'fa fa-fw fa-file')->setSubItems([
                MenuItem::linkToCrud('Верхнее меню', 'fa fa-fw fa-file', MenuTop::class),
                MenuItem::linkToCrud('Левое меню', 'fa fa-fw fa-file', MenuLeft::class),
            ]),
            MenuItem::subMenu('Редактор страниц', 'fa fa-fw fa-file-alt')->setSubItems([
                MenuItem::linkToCrud('Инфо страницы', 'fa fa-fw fa-file', Simple::class),
                MenuItem::linkToCrud('Стр. Марок', 'fas fa-car', Brand::class),
                MenuItem::linkToCrud('Стр. Моделей', 'fas fa-car', Model::class),
                MenuItem::linkToCrud('Услуги общие','fa fa-fw fa-wrench', RootService::class),
                MenuItem::linkToCrud('Услуги марок и моделей','fa fa-fw fa-wrench', Service::class),
            ]),
            MenuItem::subMenu('Прайс лист','fa fa-fw fa-hand-holding-usd')->setSubItems([
                MenuItem::linkToCrud('Марки', 'fas fa-car', PriceBrand::class),
                MenuItem::linkToCrud('Модели', 'fas fa-car', PriceModel::class),
                MenuItem::linkToCrud('Категории услуг', 'fa fa-fw fa-folder', PriceCategory::class),
                MenuItem::linkToCrud('Услуги', 'fa fa-fw fa-wrench', PriceService::class),
                MenuItem::linkToCrud('Классы', 'fa fa-fw fa-hand-holding-usd', PriceClass::class),
            ]),
            MenuItem::linkToCrud('Акции', 'fa fa-money', SpecialOffer::class),
           /* MenuItem::linkToCrud('Галерея наших работ', 'fas fa-car', OurWorks::class),*/
            MenuItem::linkToCrud('Наши работы', 'fa fa-fw fa-hand-holding-usd', Naschiraboty::class),
            MenuItem::linkToCrud('Галерея на главной',null,AttachMainGallery::class),
            MenuItem::linkToCrud('Конфиги', null, Config::class),
            MenuItem::linkToCrud('Видео', null, Video::class),
        ];
    }
}
