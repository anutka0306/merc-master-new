<?php

namespace App\Controller;

use App\Repository\ContentRepository;
use App\Repository\PriceModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use App\Repository\PriceBrandRepository;
use App\Entity\MenuTop;
use App\Repository\MenuTopRepository;
use App\Repository\MenuLeftRepository;
use App\Repository\NaschirabotyRepository;
use App\Repository\ConfigRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ContentRepository $repository, PriceBrandRepository $priceBrandRepository, MenuTopRepository $menuTopRepository, MenuLeftRepository $menuLeftRepository, NaschirabotyRepository $naschirabotyRepository, ConfigRepository $configRepository, PriceModelRepository $priceModelRepository)
    {
        $page = $repository->findOneBy(['path'=>'/']);
        $brand = $priceBrandRepository->findOneBy(['name'=>'Mercedes']);
        $models = $priceModelRepository->findAll();
        $gallery = $this->getGalleryImages();
        $topMenu = $menuTopRepository->findBy([], ['ordering'=>'ASC']);
        $leftMenu = $menuLeftRepository->findBy([], ['ordering'=>'ASC']);
        $work = $naschirabotyRepository->findOneBy([],['id' =>'DESC']);
        $this->phone = $configRepository->findOneBy(['name' =>'phone']);
        $this->phone2 = $configRepository->findOneBy(['name' => 'phone2']);
        $this->address = $configRepository->findOneBy(['name' => 'address'])->getValue();
        $this->address2 = $configRepository->findOneBy(['name'=> 'address2'])->getValue();
        
        return $this->render('v2/pages/home/index.html.twig', [
            'page' => $page,
            'gallery'=> $gallery,
            'brand' => $brand,
            'models' => $models,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu,
            'pageWork' => $work,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address,
            'address2' => $this->address2,
            'customH1' => 'Ремонт авто'
        ]);
    }

    private function getGalleryImages(){
        $finder = new Finder();
        $filesystem = new Filesystem();
        if($filesystem->exists($_SERVER['DOCUMENT_ROOT'].'/images/gallery')){
            $finder->files()->name(['*.jpeg','*.jpg','*.png'])->in($_SERVER['DOCUMENT_ROOT'].'/images/gallery');
            $files = array();
            foreach ($finder as $file){
                $files[] = '/images/gallery/'.$file->getFilename();
            }
        }else{
            $files = null;
        }


        return $files;
    }

}
