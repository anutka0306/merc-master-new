<?php

namespace App\Controller;

use App\Entity\SpecialOffer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SpecialOfferRepository;
use App\Repository\ContentRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\MenuTopRepository;
use App\Repository\MenuLeftRepository;
use App\Repository\ConfigRepository;

class OfferController extends AbstractController
{
    /**
     * @var SpecialOfferRepository
     */
    protected $offer_repository;

    /**
     * @var ContentRepository
     */
    protected $contentRepository;

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

    public function __construct(SpecialOfferRepository $offer_repository, ContentRepository $contentRepository, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, ConfigRepository $configRepository)
    {
        $this->offer_repository = $offer_repository;
        $this->contentRepository = $contentRepository;
        $this->priceBrandRepository = $priceBrandRepository;
        $this->menuTopRepository = $menuTopRepository;
        $this->menuLeftRepository = $menuLeftRepository;
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/offers", name="offers")
     */
    public function index(): Response
    {
        $offers = $this->offer_repository->findBy(['published' => 1]);
        $page = $this->contentRepository->findOneBy(['path' => '/offers/']);
        $brands = $this->priceBrandRepository->findAll();
        $topMenu = $this->menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $this->menuLeftRepository->findBy([], ['ordering'=>'ASC']);

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
            'page' => $page,
            'brands' => $brands,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address->getValue(),
            'address2' => $this->address2->getValue(),
        ]);
    }

    /**
     * @Route("/offers/{token}", name="dinamic_offers")
     */
    public function offer_item($token): Response{
        $topMenu = $this->menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $this->menuLeftRepository->findBy([], ['ordering'=>'ASC']);

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        if ( !$offer = $this->offer_repository->findOneBy(['published'=>1, 'slug'=>$token])) {
            throw $this->createNotFoundException(sprintf('Offer %s not found',$token));
        }
        if($offer instanceof SpecialOffer){
           return $this->render('offer/offer.html.twig', [
               'page'=>$offer,
               'topMenu' => $topMenu,
               'leftMenu' => $leftMenu,
               'phone' => $this->phone,
               'phone2' => $this->phone2,
               'address' => $this->address->getValue(),
               'address2' => $this->address2->getValue(),
               ]);
        }
    }
}
