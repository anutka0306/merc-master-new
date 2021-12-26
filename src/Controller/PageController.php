<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\Simple;
use App\Entity\Vacancy;
use App\Entity\ServiceWithout;
use App\Form\AskPriceType;
use App\Form\SalonFilterType;
use App\Repository\ContentRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sitemap;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ModelRepository;
use App\Repository\PriceModelRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use App\Entity\MenuTop;
use App\Repository\MenuTopRepository;
use App\Repository\MenuLeftRepository;
use App\Repository\NaschirabotyRepository;
use App\Repository\ConfigRepository;
use App\Entity\Naschiraboty;


class PageController extends AbstractController
{
    /**
     * @var NaschirabotyRepository
     */
    protected $naschirabotyRepository;
    /**
     * @var ContentRepository
     */
    protected $page_repository;
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var PaginatorInterface
     */
    protected $paginator;

    /**
     * @var PriceModelRepository
     */

    protected $price_model_repository;

    /**
     * @var PriceBrandRepository
     */
    protected $priceBrandRepository;

    /**
     * @var MenuTopRepository
     */
    protected $menuTopRepository;

    /**
     * @var MenuLeftRepository
     */
    protected $menuLeftRepository;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    protected $phone;

    public function __construct(ContentRepository $repository, EntityManagerInterface $em, PaginatorInterface $paginator, PriceModelRepository $price_model_repository, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, NaschirabotyRepository $naschirabotyRepository, ConfigRepository $configRepository)
    {
        $this->page_repository = $repository;
        $this->em = $em;
        $this->paginator = $paginator;
        $this->price_model_repository = $price_model_repository;
        $this->priceBrandRepository = $priceBrandRepository;
        $this->menuTopRepository = $menuTopRepository;
        $this->menuLeftRepository = $menuLeftRepository;
        $this->naschirabotyRepository = $naschirabotyRepository;
        $this->configRepository = $configRepository;
        $this->phone = $configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $configRepository->findOneBy(['name' =>'phone2']);
        $this->address = $configRepository->findOneBy(['name' =>'address']);
        $this->address2 = $configRepository->findOneBy(['name' =>'address2']);
    }


    /**
     * @Route("/vakancies/{vakancy}", name="vakancy", requirements={"token"= "\/.+\/$"})
     */
    public function vakancy($vakancy, ContentRepository $repository):Response{
        $vakancy = '/vakancies/'.$vakancy.'/';
        if ( ! $page = $this->page_repository->findOnePublishedByToken($vakancy)) {
            throw $this->createNotFoundException(sprintf('Page %s not found',$vakancy));
        }
        return $this->render('v2/pages/vacansy/item.html.twig', [
            'page' => $page,
        ]);
    }
    
    /**
     * @Route("/{token}", name="dynamic_pages",requirements={"token"= ".+\/$"})
     */
    public function index($token, EntityManagerInterface $em, PaginatorInterface $paginator, Request $request, PriceModelRepository $priceModelRepository, PriceServiceRepository $priceServiceRepository, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, NaschirabotyRepository $naschirabotyRepository)
    {
        $topMenu = $menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $menuLeftRepository->findBy([], ['ordering'=>'ASC']);
        if ( ! $page = $this->page_repository->findOnePublishedByToken($token)) {
            if (! $page = $this->naschirabotyRepository->findOneBy(['url' => str_replace('/','',$token)])) {
                throw $this->createNotFoundException(sprintf('Page %s not found', $token));
            }
        }

        if($page instanceof Naschiraboty){
            return $this->nashirabory_item($page, $request, $priceBrandRepository, $menuTopRepository, $menuLeftRepository);
        }

        if ($page instanceof Brand) {
            return $this->brand($page, $priceModelRepository, $topMenu, $leftMenu, $naschirabotyRepository);
        }

        if ($page instanceof Model) {
            return $this->model($page, $priceModelRepository, $priceServiceRepository, $topMenu, $leftMenu, $naschirabotyRepository);
        }

        if ($page instanceof Service) {
            /* echo 'Page is '.$page;
            exit();*/
            return $this->service($page, $priceModelRepository, $topMenu, $leftMenu, $naschirabotyRepository, $priceServiceRepository);
        }

        if ($page instanceof RootService) {
           /* echo 'Page is '.$page;
            exit();*/
            return $this->rootService($page, $priceBrandRepository, $topMenu, $leftMenu, $naschirabotyRepository);
        }

        if ($page instanceof Simple) {
            return $this->simple($page, $topMenu, $leftMenu);
        }

        if ($page instanceof Vacancy) {
            return $this->vacancy($page);
        }

        if($page instanceof ServiceWithout){
            return $this->service_without($page);
        }

        if($page instanceof Sitemap){
           /* $query = $em->createQuery("SELECT a FROM App\Entity\Content as a WHERE a.published =1 ORDER BY a.id UNION SELECT n FROM App\Entity\Naschiraboty as n ORDER BY n.id");
            $query1 = $em->createQuery("SELECT n FROM App\Entity\Naschiraboty as n ORDER BY n.id");*/
            $stmt = $em->getConnection();
            $query = $stmt->executeQuery("SELECT `id`, `name` as `h1`, `path` FROM `content` WHERE `published` = 1 UNION SELECT `id`, `name` as `h1`, `url` as `path` FROM `naschiraboty`")->fetchAll();

            $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                100 /*limit per page*/
            );

            // parameters to template
            return $this->render('sitemap/index.html.twig', ['pagination' => $pagination,'page'=>$page, 'topMenu'=>$topMenu, 'leftMenu'=>$leftMenu]);
        }

        throw $this->createNotFoundException('Page is instance of '.get_class($page));
    }

    /**
     * @param Sitemap $sitemap
     * @param EntityManagerInterface $em
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */


    private function service_without(ServiceWithout $service_without)
    {
        return $this->render('v2/pages/service_without.html.twig',[
           'page' => $service_without,
        ]);
    }
    
    private function brand(Brand $brand, PriceModelRepository $priceModelRepository, $topMenu, $leftMenu, NaschirabotyRepository $naschirabotyRepository)
    {
        $brand_name = $brand->getBrandName();
        $models = $priceModelRepository->findBy(['priceBrand' => $brand->getBrandId()]);
        $work = $naschirabotyRepository->findBy(['model'=> $models], ['id' => 'DESC'], 1);
        if(empty($work)){
            $work = $naschirabotyRepository->findOneBy([],['id' =>'DESC']);
        }
        $phone['value'] = str_replace(array('(',')','-', ' '), '',$brand->getPriceBrand()->getPhone());
        $phone['title'] = $brand->getPriceBrand()->getPhone();
        if(empty($phone['value'])){
            $phone = $this->phone;
        }

        $phone2['value'] = str_replace(array('(',')','-', ' '), '',$brand->getPriceBrand()->getPhone2());
        $phone2['title'] = $brand->getPriceBrand()->getPhone2();
        if(empty($phone2['value'])){
            $phone2 = null;
        }

        $address = $brand->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->configRepository->findOneBy(['name'=>'address'])->getValue();
        }
        $address2 = $brand->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = null;
        }

        $map = $brand->getPriceBrand()->getMap();
        if(empty($map)){
            $map = null;
        }
        return $this->render('v2/pages/brand.html.twig', [
            'page' => $brand,
            'brandName' => $brand_name,
            'models' => $models,
            'brandPath' => $brand->getPath(),
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'pageWork' => $work,
            'phone' => $phone,
            'phone2' => $phone2,
            'address' => $address,
            'address2' => $address2,
            'map'=> $map,
        ]);
    }
    
    
    private function model(Model $model, PriceModelRepository $priceModelRepository, PriceServiceRepository $priceServiceRepository, $topMenu, $leftMenu, NaschirabotyRepository $naschirabotyRepository)
    {
        $brand_name = $model->getBrandName();
        $model_id = $model->getModelId();

        $work = $naschirabotyRepository->findBy(['universal'=> 1], ['id' => 'DESC']);

        //Группируем наши работы по категориям
        $works_arr = array();
        $works_arr_to = array();
        $works_blocks_services = array();
        foreach ($work as $key => $value){
            $works_arr[$value->getPriceCategoty()->getValues()[0]->getName()][] = $value;
            $works_blocks_services[$value->getPriceCategoty()->getValues()[0]->getName()] = $value->getPriceCategoty()->getValues()[0]->getSlug();
            unset($work[$key]);
        }
        // отделяем ТО
        if(array_key_exists('Техническое обслуживание', $works_arr)){
           $works_arr_to['Техническое обслуживание'] = $works_arr['Техническое обслуживание'];
           unset($works_arr['Техническое обслуживание']);
        }

        //Получить ссылки на сервисы

//пока закомментируем
        /*if(empty($work)){
            $allBrandModels = $priceModelRepository->findBy(['priceBrand'=>$model->getBrandId()]);
            $work = $naschirabotyRepository->findBy(['model'=> $allBrandModels], ['id' => 'DESC'], 1);
        }
        if(empty($work)){
            $work = $naschirabotyRepository->findOneBy([],['id' =>'DESC']);
        }*/

        $popular_services = $priceServiceRepository->findBy(['is_popular' => 1, 'published'=> 1], [], 5);
        if($model_id){
            $model_name = $priceModelRepository->find($model_id)->getName();
        }else{
            $model_name = null;
        }

        $phone['value'] = str_replace(array('(',')','-', ' '), '',$model->getPriceBrand()->getPhone());
        $phone['title'] = $model->getPriceBrand()->getPhone();
        if(empty($phone['value'])){
            $phone = $this->phone;
        }

        $phone2['value'] = str_replace(array('(',')','-', ' '), '',$model->getPriceBrand()->getPhone2());
        $phone2['title'] = $model->getPriceBrand()->getPhone2();
        if(empty($phone2['value'])){
            $phone2 = null;
        }

        $address = $model->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->configRepository->findOneBy(['name'=>'address'])->getValue();
        }
        $address2 = $model->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = null;
        }

        $map = $model->getPriceBrand()->getMap();
        if(empty($map)){
            $map = null;
        }

        return $this->render('v2/pages/model.html.twig', [
            'page' => $model,
            'brandName' => $brand_name,
            'modelName' => $model_name,
            'popularServices' => $popular_services,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'pageWork' => $works_arr,
            'pageWorkTo' => $works_arr_to,
            'worksServices' => $works_blocks_services,
            'phone' => $phone,
            'phone2'=> $phone2,
            'address'=> $address,
            'address2'=> $address2,
            'map' => $map,
        ]);
    }
    
    private function service(Service $service, PriceModelRepository $priceModelRepository, $topMenu, $leftMenu, NaschirabotyRepository $naschirabotyRepository, PriceServiceRepository $priceServiceRepository)
    {
        $popular_services = $priceServiceRepository->findBy(['is_popular' => 1, 'published'=> 1], [], 5);
        $brand_name = $service->getBrandName();
        $model_id = $service->getModelId();

        if($model_id){
            $work = $naschirabotyRepository->findOneBy(['model' => $model_id, 'service'=> $service->getId()]);
            if(empty($work)){
                $work = $naschirabotyRepository->findOneBy(['service'=> $service->getId()]);
                if(empty($work)){
                    $work = $naschirabotyRepository->findOneBy(['model' => $model_id]);
                }
            }
           $model_name = $priceModelRepository->find($model_id)->getName();
        }else{
            $work = $naschirabotyRepository->findOneBy(['service'=> $service->getId()]);
            if(empty($work)){
                $models = $priceModelRepository->findBy(['priceBrand' => $service->getBrandId()]);
                $work = $naschirabotyRepository->findBy(['model'=> $models], ['id' => 'DESC'], 1);
                if(empty($work)){
                    $work = $naschirabotyRepository->findOneBy([],['id' =>'DESC']);
                }
            }
            $model_name = null;
        }

        $services = $this->page_repository->findOneBy(['path' => '/'.$service->getPriceCategory()->getSlug().'/']);
        $service->setName(str_replace([$brand_name.' '.$model_name, 'в Москве'], ['', ''], $service->getName() ));


        $phone['value'] = str_replace(array('(',')','-', ' '), '',$service->getPriceBrand()->getPhone());
        $phone['title'] = $service->getPriceBrand()->getPhone();
        if(empty($phone['value'])){
            $phone = $this->phone;
        }

        $phone2['value'] = str_replace(array('(',')','-', ' '), '',$service->getPriceBrand()->getPhone2());
        $phone2['title'] = $service->getPriceBrand()->getPhone2();
        if(empty($phone2['value'])){
            $phone2 = null;
        }

        $address = $service->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->address->getValue();
        }
        $address2 = $service->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = null;
        }

        $map = $service->getPriceBrand()->getMap();
        if(empty($map)){
            $map = null;
        }

        return $this->render('v2/pages/service.html.twig', [
            'page' => $service,
            'brandName' => $brand_name,
            'modelName' => $model_name,
            'parentService' => $services,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'pageWork' => $work,
            'popularServices' => $popular_services,
            'phone' => $phone,
            'phone2' => $phone2,
            'address' => $address,
            'address2' => $address2,
            'map' => $map,
        ]);
    }
    
    private function rootService(RootService $rootService, PriceBrandRepository $priceBrandRepository, $topMenu, $leftMenu, NaschirabotyRepository $naschirabotyRepository)
    {
        if(is_null($rootService->getAdvIcon1())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvIcon1() !== null) {
                $rootService->setAdvIcon1($rootService->getParent()->getAdvIcon1());
            }
        }
        if(is_null($rootService->getAdvIcon2())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvIcon2() !== null) {
                $rootService->setAdvIcon2($rootService->getParent()->getAdvIcon2());
            }
        }
        if(is_null($rootService->getAdvIcon3())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvIcon3() !== null) {
                $rootService->setAdvIcon3($rootService->getParent()->getAdvIcon3());
            }
        }
        if(is_null($rootService->getAdvIcon4())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvIcon4() !== null) {
                $rootService->setAdvIcon4($rootService->getParent()->getAdvIcon4());
            }
        }
        if(is_null($rootService->getAdvText1())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvText1() !== null) {
                $rootService->setAdvText1($rootService->getParent()->getAdvText1());
            }
        }
        if(is_null($rootService->getAdvText2())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvText2() !== null) {
                $rootService->setAdvText2($rootService->getParent()->getAdvText2());
            }
        }
        if(is_null($rootService->getAdvText3())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvText3() !== null) {
                $rootService->setAdvText3($rootService->getParent()->getAdvText3());
            }
        }
        if(is_null($rootService->getAdvText4())) {
            if ($rootService->getParent() !== null && $rootService->getParent()->getAdvText4() !== null) {
                $rootService->setAdvText4($rootService->getParent()->getAdvText4());
            }
        }


            $work = $naschirabotyRepository->findOneBy([],['id' =>'DESC']);


        $brands = $priceBrandRepository->findAll();


        return $this->render('v2/pages/root-service.html.twig', [
            'page' => $rootService,
            'brands' => $brands,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'pageWork' => $work,
            'phone' => $this->phone,
            'phone2'=> $this->phone2,
            'address' => $this->address->getValue(),
            'address2'=> $this->address2->getValue(),
        ]);
    }
    
    private function simple(Simple $simple, $topMenu, $leftMenu)
    {
        if($simple->getText()) {
            /* Разделяем текст по блокам (если они есть) */
            $textParts = array();
            $blocksOrder = array();
            $str = $simple->getText();

            $nashiRabotyIndexes = array();
            $nashiRaboty = array();

            if($pos = strpos($str, '[nashi_raboti_block]')){
                $blocksOrder[$pos] = '[nashi_raboti_block]';
                $nashiRabotyIndexes = $this->getNashiraboty4Indexes($simple->getPath());
                $nashiRabotyAll = $this->naschirabotyRepository->findAll();
                foreach ($nashiRabotyIndexes as $index){
                    $nashiRaboty[] = $nashiRabotyAll[$index];
                }
            }
            if($pos = strpos($str, '[price_zapros_form]')){
                $blocksOrder[$pos] = '[price_zapros_form]';
            }

            if($pos = strpos($str, '[video_block]')){
                $blocksOrder[$pos] = '[video_block]';
            }
            ksort($blocksOrder);
            $count = 0;
            foreach ($blocksOrder as $key => $value){
                $blocksOrder[$count] = $value;
                unset($blocksOrder[$key]);
                $count++;
            }
            $str = str_replace(array('[nashi_raboti_block]', '[price_zapros_form]', '[video_block]'), '%textBlock%', $str);

            $textParts = explode('%textBlock%', $str);

            $form = $this->createForm(AskPriceType::class);

            $models = $this->price_model_repository->findAll();
            $brand = $this->priceBrandRepository->findOneBy(['name'=>'Mercedes']);


            return $this->render('v2/pages/simple.html.twig', [
                'page' => $simple,
                'topMenu' => $topMenu,
                'leftMenu' => $leftMenu,
                'phone' => $this->phone,
                'textBlocksOrder' => $blocksOrder,
                'textParts' => $textParts,
                'form' => $form->createView(),
                'nashiRaboty' => $nashiRaboty,
                'models' => $models,
                'brand'=> $brand,
            ]);
        }
    }
    
    private function vacancy(Vacancy $vacancy)
    {
        return $this->render('v2/pages/vacansy/index.html.twig', [
            'page' => $vacancy,
        ]);
    }

    public function nashirabory_item(Naschiraboty $work, Request $request, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository): Response
    {
        if($work instanceof Naschiraboty) {
            $images = $work->getAttach();
            $topMenu = $menuTopRepository->findBy([], ['ordering' => 'ASC']);
            $leftMenu = $menuLeftRepository->findBy([], ['ordering' => 'ASC']);
            $brands = $priceBrandRepository->findAll();

            $this->phone = $this->configRepository->findOneBy(['name' => 'phone']);
            $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
            $this->address = $this->configRepository->findOneBy(['name' => 'address']);
            $this->address2 = $this->configRepository->findOneBy(['name' => 'address2']);

            $form = $this->createForm(
                SalonFilterType::class,
                null,
                ['method' => 'GET', 'priceBrand' => null]
            );
            $form->handleRequest($request);

            /*$availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);*/

            return $this->render('v2/pages/naschiraboty/item.html.twig', [
                'page' => $work,
                'item' => $work,
                'form' => $form->createView(),
                /*'availableSalons' => $availableSalons,*/
                'images' => $images,
                'topMenu' => $topMenu,
                'leftMenu' => $leftMenu,
                'brands' => $brands,
                'phone' => $this->phone,
                'phone2' => $this->phone2,
                'address' => $this->address->getValue(),
                'address2' => $this->address2->getValue(),
            ]);
        }
    }

    private function getNashiraboty4Indexes($url){
        $uri_hash = hash("sha512", $url);
        $uri_hash = base64_encode($uri_hash);
        $symb_arr = str_split($uri_hash);
        $symb_arr = array_unique($symb_arr);
        $symb_arr = array_slice($symb_arr, 0, 4);
        $numb_arr = [];

        foreach($symb_arr as $symbol) {
            if(is_numeric($symbol)) {
                $numb_arr[] = $symbol;
            }else{
                $numb_arr[] = ord($symbol) - 55;
            }
        }
        return $numb_arr;
    }

}
