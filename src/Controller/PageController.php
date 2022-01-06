<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\Simple;
use App\Entity\Vacancy;
use App\Entity\Video;
use App\Entity\ServiceWithout;
use App\Form\AskPriceType;
use App\Form\SalonFilterType;
use App\Repository\ContentRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceServiceRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
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
use App\Repository\VideoRepository;
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

    /**
     * @var VideoRepository
     */
    protected $videoRepository;

    public function __construct(ContentRepository $repository, EntityManagerInterface $em, PaginatorInterface $paginator, PriceModelRepository $price_model_repository, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, NaschirabotyRepository $naschirabotyRepository, ConfigRepository $configRepository, VideoRepository $videoRepository)
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
        $this->videoRepository = $videoRepository;
    }


    /* Редиректы */
    /**
     * @Route ("/dvigatel-mercedes-m271-remont-obsluzhivanie-ttx/mercedes-c-klass/")
     */
    public function r1(){
        return $this->redirect('/mercedes-c-klass/', 301);
    }

    /**
     * @Route ("/dvigatel-mercedes-m271-remont-obsluzhivanie-ttx/mersedes-b-klass/")
     */
    public function r2(){
        return $this->redirect('/mersedes-b-klass/', 301);
    }

    /**
     * @Route ("/dvigatel-mercedes-m271-remont-obsluzhivanie-ttx/mersedes-e-klass/")
     */
    public function r3(){
        return $this->redirect('/mersedes-e-klass/', 301);
    }

    /**
     * @Route ("/dvigatel-mercedes-m271-remont-obsluzhivanie-ttx/remont-mercedes-a-class/")
     */
    public function r4(){
        return $this->redirect('/remont-mercedes-a-class/', 301);
    }

    /**
     * @Route ("/zamena-glavnogo-tormoznogo-cilindra-mersedes/")
     */
    public function r5(){
        return $this->redirect('/uslugi/remont-podveski-mersedes/zamena-glavnogo-tormoznogo-cilindra-mersedes/', 301);
    }

    /**
     * @Route ("/zamena-masla-akpp-mercedes-mercedes/")
     */
    public function r6(){
        return $this->redirect('/uslugi/zamena-masla-mersedes/zamena-masla-akpp-mercedes-mercedes/', 301);
    }

    /**
     * @Route ("/remont-podveski-mersedes/")
     */
    public function r7(){
        return $this->redirect('/uslugi/remont-podveski-mersedes/', 301);
    }
    /**
     * @Route ("/remont-akpp-mersedes/")
     */
    public function r8(){
        return $this->redirect('/uslugi/remont-akpp-mersedes/', 301);
    }
    /**
     * @Route ("/zamena-masla-mersedes/")
     */
    public function r9(){
        return $this->redirect('/uslugi/zamena-masla-mersedes/', 301);
    }
    /**
     * @Route ("/diagnostika-mersedes-c-klassa-w204-w203-w202/")
     */
    public function r10(){
        return $this->redirect('/uslugi/diagnostika-mersedes/diagnostika-mersedes-c-klassa-w204-w203-w202/', 301);
    }
    /**
     * @Route ("/diagnostika-mersedes-gl-klassa-x164-x166/")
     */
    public function r11(){
        return $this->redirect('/uslugi/diagnostika-mersedes/diagnostika-mersedes-gl-klassa-x164-x166/', 301);
    }

    /**
     * @Route ("/diagnostika-mersedes-sl-klassa/")
     */
    public function r12(){
        return $this->redirect('/uslugi/diagnostika-mersedes/diagnostika-mersedes-sl-klassa/', 301);
    }

    /**
     * @Route ("/diagnostika-mersedes-slk-klassa/")
     */
    public function r13(){
        return $this->redirect('/uslugi/diagnostika-mersedes/diagnostika-mersedes-slk-klassa/', 301);
    }
    /**
     * @Route ("/texnicheskoe-obsluzhivanie-mersedes/")
     */
    public function r14(){
        return $this->redirect('/uslugi/texnicheskoe-obsluzhivanie-mersedes/', 301);
    }

    /* Редиректы конец */

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

       // throw $this->createNotFoundException('Page is instance of '.get_class($page));
        throw $this->createNotFoundException(sprintf('Page %s not found', $token));
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
            $phone2 = $this->phone2;
        }

        $address = $brand->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->configRepository->findOneBy(['name'=>'address'])->getValue();
        }
        $address2 = $brand->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = $this->configRepository->findOneBy(['name'=>'address2'])->getValue();
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
            $phone2 = $this->phone2;
        }

        $address = $model->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->configRepository->findOneBy(['name'=>'address'])->getValue();
        }
        $address2 = $model->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = $this->configRepository->findOneBy(['name'=>'address2'])->getValue();
        }

        $map = $model->getPriceBrand()->getMap();
        if(empty($map)){
            $map = null;
        }
        $models = $this->price_model_repository->findAll();
        $video = $this->videoRepository->findBy([],[],4);

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
            'models' => $models,
            'video' => $video,
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
        $service->setName(str_replace([$brand_name.' '.$model_name, 'в Санкт-Петербурге'], ['', ''], $service->getName() ));


        $phone['value'] = str_replace(array('(',')','-', ' '), '',$service->getPriceBrand()->getPhone());
        $phone['title'] = $service->getPriceBrand()->getPhone();
        if(empty($phone['value'])){
            $phone = $this->phone;
        }

        $phone2['value'] = str_replace(array('(',')','-', ' '), '',$service->getPriceBrand()->getPhone2());
        $phone2['title'] = $service->getPriceBrand()->getPhone2();
        if(empty($phone2['value'])){
            $phone2 = $this->phone2;
        }

        $address = $service->getPriceBrand()->getAddress();
        if(empty($address)){
            $address = $this->address->getValue();
        }
        $address2 = $service->getPriceBrand()->getAddress2();
        if(empty($address2)){
            $address2 = $this->address->getValue();
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

        if($rootService->getText()) {
            /* Разделяем текст по блокам (если они есть) */
            $textParts = array();
            $blocksOrder = array();
            //Вырезать остальные шорткоды такого типа
            $patterns = array();
            $patterns[0] = '/(\[fusion_builder_container[^\[]*\])/';
            $patterns[1] = '/(\[fusion_builder_row[^\[]*\])/';
            $patterns[2] = '/(\[fusion_builder_column[^\[]*\])/';
            $patterns[3] = '/(\[fusion_title[^\[]*\])/';
            $patterns[4] = '/(\[\/fusion_title[^\[]*\])/';
            $patterns[5] = '/(\[fusion_text[^\[]*\])/';
            $patterns[6] = '/(\[\/fusion_text[^\[]*\])/';
            $patterns[7] = '/(\[\/fusion_builder_column[^\[]*\])/';
            $patterns[8] = '/(\[\/fusion_builder_row[^\[]*\])/';
            $patterns[9] = '/(\[\/fusion_builder_container[^\[]*\])/';
            $patterns[10] = '/(\[fusion_gallery[^\[]*\])/';
            $patterns[11] = '/(\[fusion_checklist[^\[]*\])/';
            $patterns[12] = '/(\[fusion_li_item[^\[]*\])/';
            $patterns[13] = '/\[\/fusion_li_item]/';
            $patterns[14] = '/\[\/fusion_checklist]/';
            $patterns[15] = '/(\[fusion_alert[^\[]*\])/';
            $patterns[16] = '/\[\/fusion_alert]/';
            $patterns[17] = '/(\[fusion_youtube[^\[]*\])/';
            $patterns[18] = '/(\[Best_Wordpress_Gallery[^\[]*\])/';
            $patterns[19] = '/(\[fusion_tagline_box[^\[]*\])/';
            $patterns[20] = '/\[\/fusion_tagline_box]/';
            $patterns[21] = '/(\[su_youtube_advanced[^\[]*\])/';

            $replacement = '';

            $rootService->setText(preg_replace($patterns, $replacement, $rootService->getText()));
            $str = $rootService->getText();

            $nashiRabotyIndexes = array();
            $nashiRaboty = array();

            if($pos = strpos($str, '[nashi_raboti_block]')){
                $blocksOrder[$pos] = '[nashi_raboti_block]';
                $nashiRabotyIndexes = $this->getNashiraboty4Indexes($rootService->getPath());
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
            'textBlocksOrder' => $blocksOrder,
            'textParts' => $textParts,
            'form' => $form->createView(),
            'nashiRaboty' => $nashiRaboty,
            'models' => $models,
        ]);
    }
        }
    
    private function simple(Simple $simple, $topMenu, $leftMenu)
    {
        if($simple->getText()) {
            /* Разделяем текст по блокам (если они есть) */
            $textParts = array();
            $blocksOrder = array();

            //Вырезать остальные шорткоды такого типа
            $patterns = array();
            $patterns[0] = '/(\[fusion_builder_container[^\[]*\])/';
            $patterns[1] = '/(\[fusion_builder_row[^\[]*\])/';
            $patterns[2] = '/(\[fusion_builder_column[^\[]*\])/';
            $patterns[3] = '/(\[fusion_title[^\[]*\])/';
            $patterns[4] = '/(\[\/fusion_title[^\[]*\])/';
            $patterns[5] = '/(\[fusion_text[^\[]*\])/';
            $patterns[6] = '/(\[\/fusion_text[^\[]*\])/';
            $patterns[7] = '/(\[\/fusion_builder_column[^\[]*\])/';
            $patterns[8] = '/(\[\/fusion_builder_row[^\[]*\])/';
            $patterns[9] = '/(\[\/fusion_builder_container[^\[]*\])/';
            $patterns[10] = '/(\[fusion_gallery[^\[]*\])/';
            $patterns[11] = '/(\[fusion_checklist[^\[]*\])/';
            $patterns[12] = '/(\[fusion_li_item[^\[]*\])/';
            $patterns[13] = '/\[\/fusion_li_item]/';
            $patterns[14] = '/\[\/fusion_checklist]/';
            $patterns[15] = '/(\[fusion_alert[^\[]*\])/';
            $patterns[16] = '/\[\/fusion_alert]/';
            $patterns[17] = '/(\[fusion_youtube[^\[]*\])/';
            $patterns[18] = '/(\[Best_Wordpress_Gallery[^\[]*\])/';
            $patterns[19] = '/(\[fusion_tagline_box[^\[]*\])/';
            $patterns[20] = '/\[\/fusion_tagline_box]/';
            $patterns[21] = '/(\[su_youtube_advanced[^\[]*\])/';


            $replacement = '';

            $simple->setText(preg_replace($patterns, $replacement, $simple->getText()));

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
            $video = $this->videoRepository->findBy([],[],4);
            $this->phone = $this->configRepository->findOneBy(['name' => 'phone']);
            $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
            $this->address = $this->configRepository->findOneBy(['name' => 'address']);
            $this->address2 = $this->configRepository->findOneBy(['name' => 'address2']);




            return $this->render('v2/pages/simple.html.twig', [
                'page' => $simple,
                'topMenu' => $topMenu,
                'leftMenu' => $leftMenu,
                'phone' => $this->phone,
                'phone2' => $this->phone2,
                'address' => $this->address->getValue(),
                'address2' => $this->address2->getValue(),
                'textBlocksOrder' => $blocksOrder,
                'textParts' => $textParts,
                'form' => $form->createView(),
                'nashiRaboty' => $nashiRaboty,
                'models' => $models,
                'brand'=> $brand,
                'video' => $video,
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


//Замена шорткодов галереи в тексте
            $text = '';
            if(!is_null($work->getText())){
                $text = str_replace('"','\'',$work->getText());
                /*$regex = "/(\[su_custom_gallery source).*\[\/su_custom_gallery\]/";*/
                $regex = "/(\[su_custom_gallery source).*(\[\/su_custom_gallery\])?/";
                $result = preg_match_all($regex, $text, $out);
                if(!empty($result)){
                    $media_gallery_index = array();
                    $media_gallery = '';
                    for($i=0; $i<$result; $i++) {
                        $media_regex = "/media: ((\d)*(,)?)*/";
                        $media_result = preg_match_all($media_regex, $out[0][$i], $media_out);

                        if(isset($media_out[0][0])) {
                            $media_out[0][0] = str_replace('media: ', ',', $media_out[0][0]);
                            $media_out[0][0] = trim($media_out[0][0], ',');
                            $media_gallery_index = explode(',', $media_out[0][0]);
                            $media_gallery = $this->createWorkGallery($media_gallery_index);
                        }

                        $text = str_replace($out[0][$i], $media_gallery, $text);
                    }
                }

                //Проверка на второй тип шорткодов
                $regex1 = "/(\[fusion_images).*(\[\/fusion_images])/";
                $result1 = preg_match_all($regex1, $text, $out1);

                if(!empty($result1)){
                    $media_gallery1 = array();

                    for($i=0; $i<$result1; $i++) {
                        $media_regex1 = "/image=('[^']*')|(\"[^\"]*\")/";
                        $media_result1 = preg_match_all($media_regex1, $out1[0][$i], $media_out);
                        /*var_dump($media_out);
                        exit();*/

                        if(isset($media_out[0])) {
                            foreach ($media_out[0] as $key => $value){
                                $media_out[0][$key] = str_replace("image='http://merc-master.ru/wp-content", "'", $media_out[0][$key]);
                            }


                            $media_gallery1 = $this->createWorkGallery2($media_out[0]);
                        }

                        $text = str_replace($out1[0][$i], $media_gallery1, $text);
                    }


                }
            }

            //Вырезать остальные шорткоды такого типа
            $patterns = array();
            $patterns[0] = '/(\[fusion_builder_container[^\[]*\])/';
            $patterns[1] = '/(\[fusion_builder_row[^\[]*\])/';
            $patterns[2] = '/(\[fusion_builder_column[^\[]*\])/';
            $patterns[3] = '/(\[fusion_title[^\[]*\])/';
            $patterns[4] = '/(\[\/fusion_title[^\[]*\])/';
            $patterns[5] = '/(\[fusion_text[^\[]*\])/';
            $patterns[6] = '/(\[\/fusion_text[^\[]*\])/';
            $patterns[7] = '/(\[\/fusion_builder_column[^\[]*\])/';
            $patterns[8] = '/(\[\/fusion_builder_row[^\[]*\])/';
            $patterns[9] = '/(\[\/fusion_builder_container[^\[]*\])/';
            $patterns[10] = '/(\[fusion_gallery[^\[]*\])/';
            $patterns[11] = '/(\[fusion_checklist[^\[]*\])/';
            $patterns[12] = '/(\[fusion_li_item[^\[]*\])/';
            $patterns[13] = '/\[\/fusion_li_item]/';
            $patterns[14] = '/\[\/fusion_checklist]/';
            $patterns[15] = '/(\[fusion_alert[^\[]*\])/';
            $patterns[16] = '/\[\/fusion_alert]/';
            $patterns[17] = '/(\[fusion_youtube[^\[]*\])/';
            $patterns[18] = '/(\[Best_Wordpress_Gallery[^\[]*\])/';
            $patterns[19] = '/(\[fusion_tagline_box[^\[]*\])/';
            $patterns[20] = '/\[\/fusion_tagline_box]/';
            $patterns[21] = '/(\[su_youtube_advanced[^\[]*\])/';

            $replacement = '';
            $text = preg_replace($patterns, $replacement, $text);

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
                'text' => $text,
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

    private function createWorkGallery($gallery_index){
        $rsm = new ResultSetMappingBuilder($this->em);
        $gallery_code = '<div class="nashiraboty__inside-gallery">';
        foreach ($gallery_index as $key => $value){

            $stmt = $this->em->getConnection();
            $query = $stmt->executeQuery("SELECT `meta_value` FROM yup_postmeta WHERE `post_id` ='".$value."'")->fetchAll();
            if($query[0]["meta_value"]) {
                $gallery_code .= "<img width='200' src='/uploads/" . $query[0]["meta_value"] . "'>";
            }
        }
        $gallery_code .= '</div>';
        return $gallery_code;
    }

    private function createWorkGallery2($images){
        $gallery_code = '<div class="nashiraboty__inside-gallery">';
        foreach ($images as $image){
            $gallery_code .= '<img width="200" src='.$image.'>';
        }
        $gallery_code .= '</div>';
        return $gallery_code;
    }



}
