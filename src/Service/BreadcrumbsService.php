<?php

namespace App\Service;

use App\Dto\BreadcrumbsItemDTO;
use App\Entity\Brand;
use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
use App\Entity\Model;
use App\Entity\RootService;
use App\Repository\ContentRepository;

class BreadcrumbsService
{
    /**
     * @var ContentRepository
     */
    protected $content_repository;
    
    public function __construct(ContentRepository $content_repository)
    {
        $this->content_repository = $content_repository;
    }

    /**
     * @param PageInterface $page
     * @param string|null $current_name
     *
     * @return BreadcrumbsItemDTO[]|array
     */
    public function getItems(PageInterface $page, string $current_name = null): array
    {
        if ($current_name) {
            //Получаем не измененный объект страницы
            $items   = $this->getChainRecursive($this->content_repository->find($page->getId()));
            $items[] = new BreadcrumbsItemDTO($current_name, $page->getPath());
        } else {
            $items = $this->getChainRecursive($page);
        }
        
        return $items;
        
    }
    
    private function getChainRecursive(PageInterface $page): array
    {
        $chain = [];
        $item  = new BreadcrumbsItemDTO($page->getName(), $page->getPath());
        if ($page instanceof Content && $page->getId() === 1) {
            $item->name = 'Ремонт Mercedes';
        }

        if($page instanceof RootService){
            $item->name = $item->name . ' Mercedes';
        }

        $chain[] = $item;

        if($page instanceof Model){
            $parent = $this->content_repository->findOneBy(['path' => '/']);
            $parent->setName('Ремонт '. str_replace('Ремонт', '',$parent->getName()));
        }

        else {
            $parent = $page->getParent();
            if($parent) {
                if ($parent->getPath() == '/') {
                    $parent->setName('Ремонт ' . str_replace('Ремонт', '',$parent->getName()));
                }
            }
        }
            if (null === $parent) {
                return $chain;
            }
            if (is_string($parent)) {
                $parent = $this->content_repository->findOneBy(['path' => $parent]);
            }

        
        return array_merge($this->getChainRecursive($parent), $chain);
    }
}