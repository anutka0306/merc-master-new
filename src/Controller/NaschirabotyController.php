<?php

namespace App\Controller;

use App\Form\SalonFilterType;
use App\Repository\MenuTopRepository;
use  App\Repository\MenuLeftRepository;
use App\Repository\PriceBrandRepository;
use App\Service\SalonManager;
use App\Entity\Naschiraboty;
use App\Repository\ContentRepository;
use App\Repository\NaschirabotyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ConfigRepository;

class NaschirabotyController extends AbstractController
{
    /**
     * @var SalonManager
     */
    protected $salon_manager;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    public function __construct(SalonManager $salon_manager, ConfigRepository $configRepository)
    {
        $this->salon_manager = $salon_manager;
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/blog/", name="naschiraboty_index")
     * @param ContentRepository $content_repository
     * @param  NaschirabotyRepository $naschiraboty_repository
     * @param Request $request
     * @return Response
     */
    public function index( ContentRepository $content_repository, NaschirabotyRepository $naschiraboty_repository,Request $request, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, PriceBrandRepository $priceBrandRepository, ConfigRepository $configRepository): Response
    {
        $page = $content_repository->findOneByToken('blog');
        $works = $naschiraboty_repository->findAll();
        $topMenu = $menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $menuLeftRepository->findBy([], ['ordering'=>'ASC']);
        $brands = $priceBrandRepository->findAll();

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        foreach ($works as $key => $value){
            $images = $value->getAttach();
            $value->images = $images;
        }

        foreach ($works as $key => $value){
            if(is_null($value->getBlogImg())){
                $text = $value->getText();
                $pattern = '/<img.*\/>/';
                preg_match($pattern, $text, $matches);
                if(!empty($matches)) {
                    $first_img = $matches[0];
                    $pattern1 = '/(src="[^"]*")/';
                    preg_match($pattern1, $first_img, $match_src);
                    if(!empty($match_src[0])){
                        $value->previewImg = str_replace(array("src=","\""),"",$match_src[0]);
                    }
                }
            }
        }

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/naschiraboty/index.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
            'works' => $works,
            'topMenu' => $topMenu,
            'leftMenu' =>$leftMenu,
            'brands' => $brands,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address->getValue(),
            'address2' => $this->address2->getValue(),
        ]);
    }




}
