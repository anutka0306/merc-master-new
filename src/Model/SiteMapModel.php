<?php

namespace App\Model;

use App\Dto\PageDto;
use App\Repository\ContentRepository;
use App\Repository\FaqRepository;
use App\Repository\NaschirabotyRepository;
use App\Repository\NewsRepository;
use App\Repository\ReviewsRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SiteMapModel
{
    /**
     * @var UrlGeneratorInterface
     */
    protected $urlGenerator;
    /**
     * @var FaqRepository
     */
    protected $faq_repository;
    /**
     * @var PageDto[]
     */
    private $pages = [];
    /**
     * @var ContentRepository
     */
    protected $content_repository;
    /**
     * @var NaschirabotyRepository
     */
    protected $works_repository;
    /**
     * @var NewsRepository
     */
    protected $news_repository;
    /**
     * @var ReviewsRepository
     */
    protected $reviews_repository;
    
    const URL_LIMIT = 50000;
    const PART_FILE_BASE_NAME = 'sitemap';
    private $url_counter = 0;
    private $file_counter = 1;
    
    public function __construct(
        ContentRepository $content_repository,
        NaschirabotyRepository $works_repository,
        NewsRepository $news_repository,
        ReviewsRepository $reviews_repository,
        FaqRepository $faq_repository,
        UrlGeneratorInterface $urlGenerator
    ) {
        
        $this->content_repository = $content_repository;
        $this->works_repository   = $works_repository;
        $this->news_repository    = $news_repository;
        $this->reviews_repository = $reviews_repository;
        $this->urlGenerator       = $urlGenerator;
        $this->faq_repository     = $faq_repository;
    }
    
    
    public function getPagesBatches():array
    {
        $this->addContentPages();
        $this->addWorksPages();
        $this->addNewsPages();
        $this->addReviewsPages();
        $this->addFaqPages();
        
        return $this->pages;
    }
    
    private function addContentPages()
    {
        $pages    = $this->content_repository->findBy(['published'=>true], ['id' => 'asc']);
        $excluded = ['/404/'];
        foreach ($pages as $page) {
            if (in_array($page->getPath(), $excluded)) {
                continue;
            }
            $this->addPage($page->getPath(), $page->getModifyDate());
        }
    }
    
    private function addWorksPages()
    {
        $pages = $this->works_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path          = $this->urlGenerator->generate('naschiraboty_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addNewsPages()
    {
        $pages = $this->news_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path          = $this->urlGenerator->generate('news_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addReviewsPages()
    {
        $pages = $this->reviews_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path          = $this->urlGenerator->generate('reviews_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addFaqPages()
    {
        $pages = $this->faq_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path          = $this->urlGenerator->generate('faq_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addPage($path,$modifyDate){
        $this->url_counter++;
        if ($this->url_counter > self::URL_LIMIT) {
            $this->file_counter++;
            $this->url_counter = 1;
        }
        $file_name = self::PART_FILE_BASE_NAME.$this->file_counter.'.xml';
        $this->pages[$file_name][] = new PageDto($path, $modifyDate);
    }
}