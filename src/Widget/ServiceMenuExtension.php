<?php

namespace App\Widget;

use App\Dto\ServiceDTO;
use App\Entity\Content;
use App\Entity\PriceCategory;
use App\Entity\Service;
use App\Service\PriceListHelper;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ServiceMenuExtension extends AbstractExtension
{
    /**
     * @var AdapterInterface
     */
    protected $cache;
    /**
     * @var PriceListHelper
     */
    protected $price_list_helper;
    
    public function __construct(AdapterInterface $cache, PriceListHelper $price_list_helper)
    {
        $this->cache             = $cache;
        $this->price_list_helper = $price_list_helper;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('service_menu', [$this, 'service_menu'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('service_menu_full', [$this, 'service_menu_full'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('paint_menu', [$this, 'paint_menu'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('article_menu', [$this, 'article_menu'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    /**
     * @param Environment $twig
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function service_menu(Environment $twig): string
    {
        $item = $this->cache->getItem('service_menu');
        if ( ! $item->isHit()) {//если данное значение не закешировано
            $services = [];
            /*TODO перенести в БД*/
            $services[] = new ServiceDTO('Локальный ремонт кузова', '/local_body_repair/', 'kuzov_main_page_kusok.jpg',
                7777);
            $services[] = new ServiceDTO('Локальная покраска автомобиля', '/paint/local_paint/', 'localn_pokraska.jpg',
                1200);
            $services[] = new ServiceDTO('Удаление вмятин без покраски', '/repair_indents/remov_indents_paint/',
                'udalenie_vmyatin_bez_pokraski.jpg');
            $services[] = new ServiceDTO('Полировка кузова автомобиля', '/polishing/', 'polirovka_kuzova.jpg');
            $services[] = new ServiceDTO('Удаление царапин на автомобиле', '/remov_scratch/', 'udalenie_carapin.jpg');
            $services[] = new ServiceDTO('Ремонт бампера', '/bampers/', 'remont_bampera.jpg', 1200);
            $services[] = new ServiceDTO('Замена стекла авто', '/repair_glass/', 'zamena_stekol.jpg');
            $services[] = new ServiceDTO('Ремонт сколов краски на авто', '/repair_chips_paint/', 'remont_skolov.jpg');
            //$services[] = new ServiceDTO('Ремонт сколов на лобовом стекле','/repair_glass/repair_chips_wind/','remont_skolov_na_lobovom.jpg');
            $services[] = new ServiceDTO('Покраска бампера', '/paint/paint_bampers/', 'pokraska_bampera.jpg');
            $services[] = new ServiceDTO('Полировка фар', '/polishing/pol_headlights/', 'polirovka_far.jpg');
            
            $html = $twig->render('widget/service_menu.html.twig', compact('services'));
            $item->set($html);
            $this->cache->save($item);
        }
        
        return $item->get();
    }
    
    /**
     * @param Environment $twig
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function service_menu_full(Environment $twig): string
    {
        $item = $this->cache->getItem('service_menu_full');
        if ( ! $item->isHit()) {//если данное значение не закешировано
            $services = [];
            /*TODO перенести в БД*/
            $services[] = new ServiceDTO('Кузовной ремонт','/','kuzov_main_page_kusok.jpg',7777,'Устраняем любые кузовные повреждения. Делаем даже самый сложный ремонт кузова');
            $services[] = new ServiceDTO('Локальный ремонт','/local_body_repair/','kuzov_main_page_kusok.jpg',7777,'Быстрый и долговечный &laquo;точечный&raquo; без ремонта всей детали кузова автомобиля');
            $services[] = new ServiceDTO('Ремонт порогов','/local_body_repair/porogi/','kuzov_main_page_kusok.jpg',1500,'Ремонтируем пороги автомобиля. Даже умеем менять фрагменты металла данной части');
            $services[] = new ServiceDTO('Ремонт бампера','/bampers/','remont_bampera.jpg',1200,'Все виды работ с бамперами. Замена, покраска, спайка и вытягивание вмятин');
            $services[] = new ServiceDTO('Ремонт капота','/local_body_repair/cowl_repair/','kuzov_main_page_kusok.jpg',1500,'Рихтуем и выправляем любые вмятины, устраняем сколы и царапины. Быстро и надолго');
            $services[] = new ServiceDTO('Ремонт лонжерона','/local_body_repair/longeron_repair/','kuzov_main_page_kusok.jpg',1500,'При необходимости сможем провести даже его частичную замену');
            $services[] = new ServiceDTO('Ремонт двери','/local_body_repair/door/','kuzov_main_page_kusok.jpg',1500,'Исправляем провисания, вмятины и прочие повреждения. Красим, меняем, свариваем');
            $services[] = new ServiceDTO('Восстановление геометрии','/body_works/recover_geometry/','kuzov_main_page_kusok.jpg',1500,'Эффективное восстановление геометрии автомобиля после серьезных повреждений');
            $services[] = new ServiceDTO('Полная покраска','/paint/','localn_pokraska.jpg',1200,'Самые современные покрасочные камеры. Лучшие материалы, проверенные годами.');
            $services[] = new ServiceDTO('Локальная покраска','/paint/local_paint/','localn_pokraska.jpg',1200,'&laquo;Точечная&raquo; покраска без снятия детали. Быстро, эффективно и намного дешевле');
            $services[] = new ServiceDTO('Удаление царапин','/remov_scratch/','udalenie_carapin.jpg',1500,'Полное устранение любых царапин в любых местах. Делаем так, как будто их не было');
            $services[] = new ServiceDTO('Удаление сколов','/repair_chips_paint/','remont_skolov.jpg',1500,'Сколы, отслоения краски и лака, &laquo;жучки&raquo;. Убираем, красим с 100% попаданием в цвет');
            $services[] = new ServiceDTO('Убираем вмятины','/repair_indents/','udalenie_vmyatin_bez_pokraski.jpg',1500,'Вытягиваем любые вмятины, любой ширины и глубины. Полностью восстанавливаем деталь');
            $services[] = new ServiceDTO('Установка автостекол','/repair_glass/','zamena_stekol.jpg',1500,'Установка, снятие и замена абсолютно всех стекол автомобиля. От фар до лобового стекла');
            $services[] = new ServiceDTO('Все виды полировки','/polishing/','polirovka_kuzova.jpg',1500,'Профессиональная полировка автомобиля. Возвращение первоначального блеска');
            $services[] = new ServiceDTO('Аргонная сварка','/argon/','kuzov_main_page_kusok.jpg',1500,'Имеем оборудование и специалистов для работы с алюминиевыми кузовами и деталями');
            
            $html = $twig->render('widget/service_menu.html.twig', compact('services'));
            $item->set($html);
            $this->cache->save($item);
        }
        
        return $item->get();
    }
    
    /**
     * @param Environment $twig
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function paint_menu(Environment $twig): string
    {
        $item = $this->cache->getItem('paint_menu');
        if ( ! $item->isHit()) {//если данное значение не закешировано
            $services = [];
            /*TODO перенести в БД*/
            $services[] = new ServiceDTO('Локальная покраска автомобиля', '/paint/local_paint/', 'localn_pokraska.jpg');
            $services[] = new ServiceDTO('Покраска бампера', '/paint/paint_bampers/', 'pokraska_bampera.jpg');
            $services[] = new ServiceDTO('Покраска капота', '/paint/cowl_paint/', 'kusokk_kapot_kkvks.jpg');
            $services[] = new ServiceDTO('Покраска крыла', '/paint/paint_covered/', 'paint_kriloosdmv.jpg');
            $services[] = new ServiceDTO('Покраска порогов автомобиля', '/paint/thresholds/', 'paint_poroggksdc.jpg');
            
            $html = $twig->render('widget/paint_menu.html.twig', compact('services'));
            $item->set($html);
            $this->cache->save($item);
        }
        
        return $item->get();
    }
    
    public function article_menu(Environment $twig, Service $service): string
    {
        $parent         = $service->getParent();
        $all_articles   = $parent->getPages();
        $root_category  = $this->price_list_helper->getRootCategory($service);
        $sub_categories = $root_category->getAllChildrenIds();
        $articles = $all_articles->filter(function (Content $article) use ($sub_categories){
            if (!($article instanceof Service)) {
                return false;
            }
            if (!$article->getPriceCategory()) {
                return false;
            }
            if ( ! $article->getPublished()) {
                return false;
            }
            return in_array($article->getPriceCategory()->getId(),$sub_categories);
        });
        return $twig->render('widget/article_menu.html.twig', compact('articles','service'));
    }
}
