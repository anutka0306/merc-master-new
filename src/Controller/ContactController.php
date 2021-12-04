<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContentRepository;
use App\Repository\MenuTopRepository;
use App\Repository\MenuLeftRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\ConfigRepository;

class ContactController extends AbstractController
{
    /**
     * @var PriceBrandRepository
     */
    protected $priceBrandRepository;
    /**
     * @var ContentRepository
     */
    protected $page_repository;

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

    public function __construct(ContentRepository $repository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, PriceBrandRepository $priceBrandRepository, ConfigRepository $configRepository)
    {
        $this->page_repository = $repository;
        $this->menuTopRepository = $menuTopRepository;
        $this->menuLeftRepository = $menuLeftRepository;
        $this->priceBrandRepository = $priceBrandRepository;
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/contacts/", name="contacts")
     */
    public function index(): Response
    {
        if(! $page = $this->page_repository->findOneBy(['path'=>'/contacts/'])){
            throw $this->createNotFoundException('Page /contacts/ not found');
        }
        $topMenu = $this->menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $this->menuLeftRepository->findBy([], ['ordering'=>'ASC']);
        $brands = $this->priceBrandRepository->findAll();

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        return $this->render('v2/pages/contact/index.html.twig', [
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
}
