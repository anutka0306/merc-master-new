<?php

namespace App\Service;

use App\Entity\Brand;
use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
use App\Entity\Model;
use App\Entity\Service;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SchemaBreadcrumbsService
{
    protected $base_uri;
    
    public function __construct(ParameterBagInterface $params)
    {
        $this->base_uri = $params->get('base_uri');
    }
    
    public function getSchema(PageInterface $content):?array
    {
        if ( ! $this->supports($content)) {
            return null;
        }
        $chain = $this->getChain($content);
        $schema['@context'] = 'http://schema.org';
        $schema['@type'] = 'BreadcrumbList';
        $schema['itemListElement'] = $this->getItemList($chain);
        return $schema;
    }
    
    private function getChain(Content $content)
    {
        $pages=[];
       
        $pages[] = $content;
        
        if ( ! $content->getParent()) {
            return $pages;
        }
        $parent = $content->getParent();
        
        return array_merge($this->getChain($parent), $pages);
    }
    
    /**
     * @param Content[] $chain
     *
     * @return array
     */
    private function getItemList($chain)
    {
        $itemListElement = [];
        foreach ($chain as $index => $item) {
            $element                = [];
            $element['@type']       = 'ListItem';
            $element['position']    = $index + 1;
            $element['item']['@id'] = $this->base_uri.$item->getPath();
            if ($item->getId() === 1) {
                $element['item']['name'] = "📍 ДетейлингофЪ";
            }elseif ($item instanceof Brand){
                $element['item']['name'] = $this->getIcon($index)." Кузовной ремонт ".$item->getBrandName();
            }elseif ($item instanceof Model){
                $element['item']['name'] = $this->getIcon($index)." ".$item->getModelName();
            }elseif ($item instanceof Service){
                $element['item']['name'] = $this->getIcon($index)." ".$item->getName();
            }
            $itemListElement[] = $element;
        }
        
        return $itemListElement;
    }
    
    private function supports($content)
    {
        return $content instanceof Service || $content instanceof Brand || $content instanceof Model;
    }
    
    private function getIcon($index)
    {
        return $index%2===1?'⭐':'✅';
    }
}