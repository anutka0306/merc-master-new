<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VideoRepository;
use App\Repository\ContentRepository;
use App\Repository\MenuLeftRepository;
use App\Repository\MenuTopRepository;
use App\Repository\ConfigRepository;

class VideoblogController extends AbstractController
{
    /**
     * @var VideoRepository
     */
    protected $videoRepository;

    /**
     * @var ContentRepository
     */
    protected $contentRepository;

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

    public function __construct(VideoRepository $videoRepository, ContentRepository $contentRepository, MenuLeftRepository $menuLeftRepository, MenuTopRepository $menuTopRepository, ConfigRepository $configRepository){
        $this->videoRepository = $videoRepository;
        $this->contentRepository = $contentRepository;
        $this->menuLeftRepository = $menuLeftRepository;
        $this->menuTopRepository = $menuTopRepository;
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/videoblog", name="videoblog")
     */
    public function index(): Response
    {
        if(!$page = $this->contentRepository->findOneBy(['path' => '/videoblog/'])){
           throw $this->createNotFoundException('Page /videoblog/ not found');
        }
        $topMenu = $this->menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $this->menuLeftRepository->findBy([], ['ordering'=>'ASC']);

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        $video = $this->videoRepository->findAll();
        foreach ($video as $item){
            if(!is_null($item->getText()) and !empty($item->getText())) {
                $item->shortText = mb_strcut($item->getText(), 0, 100);
            }
            else{
                $item->shortText = '';
            }
        }
        return $this->render('videoblog/index.html.twig', [
            'page' => $page,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address->getValue(),
            'address2' => $this->address2->getValue(),
            'video' => $video,
        ]);
    }

    /**
     * @Route("/videoblog/{token}", name="videoblog_item")
     */
    public function item($token): Response{
        if(!$page = $this->videoRepository->findOneBy(['detail_link' => $token])){
           throw $this->createNotFoundException('Page /videoblog/ not found');
        }
        $topMenu = $this->menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $this->menuLeftRepository->findBy([], ['ordering'=>'ASC']);

        $this->phone = $this->configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $this->configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $this->configRepository->findOneBy(['name' => 'address']);
        $this->address2 = $this->configRepository->findOneBy(['name'=> 'address2']);

        return $this->render('videoblog/item.html.twig',[
            'page' => $page,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address->getValue(),
            'address2' => $this->address2->getValue(),

        ]);
    }
}
