<?php

namespace App\Service;

use App\Dto\BreadcrumbsItemDTO;
use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
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
            $item->name = 'Mercedes';
        }
        $chain[] = $item;
        $parent  = $page->getParent();
        if (null === $parent) {
            return $chain;
        }
        if (is_string($parent)) {
            $parent = $this->content_repository->findOneBy(['path'=>$parent]);
        }
        
        return array_merge($this->getChainRecursive($parent), $chain);
    }
}