<?php


namespace App\Widget;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\PriceCategoryRepository;
use App\Repository\ContentRepository;


class FooterMenuExtension extends AbstractExtension
{
    /**
     * @var PriceCategoryRepository
     */
    protected $price_category_repository;

    /**
     * @var ContentRepository
     */
    protected $contentRepository;

    public function __construct(PriceCategoryRepository $price_category_repository, ContentRepository $contentRepository){
        $this->price_category_repository = $price_category_repository;
        $this->contentRepository = $contentRepository;
    }

    public function getFunctions():array
    {
        return [
            new TwigFunction('footer_menu', [$this, 'footer_menu'], ['needs_environment'=> true, 'is_safe' => ['html']]),
            new TwigFunction('inner_menu', [$this, 'inner_menu'], ['needs_environment'=> true, 'is_safe' => ['html']])
        ];
    }

    public function footer_menu(Environment $twig):string{
        $items = $this->price_category_repository->findAll();
        foreach ($items as $item){

            /* Когда будет генерация страниц проверить еще раз это место */
            $cleanSlug = trim($item->getSlug(), '/');

            if($path = $this->contentRepository->findOneBy(['path'=>$item->getSlug()])){
                $item->realPath = trim($path->getPath(), '/');
            }elseif($path = $this->contentRepository->findOneBy(['path'=>$cleanSlug])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>'/'.$cleanSlug])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>$cleanSlug.'/'])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>'/'.$cleanSlug.'/'])){
                $item->realPath = trim($path->getPath(), '/');
            }
            else {
                $item->realPath = null;
            }
        }
        return $twig->render('v2/widget/footer_menu.html.twig', compact('items'));
    }

    public function inner_menu(Environment $twig):string{
        $items = $this->price_category_repository->findAll();
        foreach ($items as $item){

            /* Когда будет генерация страниц проверить еще раз это место */
            $cleanSlug = trim($item->getSlug(), '/');

            if($path = $this->contentRepository->findOneBy(['path'=>$item->getSlug()])){
                $item->realPath = trim($path->getPath(), '/');
            }elseif($path = $this->contentRepository->findOneBy(['path'=>$cleanSlug])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>'/'.$cleanSlug])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>$cleanSlug.'/'])){
                $item->realPath = trim($path->getPath(), '/');
            }
            elseif($path = $this->contentRepository->findOneBy(['path'=>'/'.$cleanSlug.'/'])){
                $item->realPath = trim($path->getPath(), '/');
            }
            else {
                $item->realPath = null;
            }
        }
        return $twig->render('v2/widget/inner_menu.html.twig', compact('items'));
    }

}