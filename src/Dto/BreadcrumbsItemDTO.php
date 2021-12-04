<?php

namespace App\Dto;

class BreadcrumbsItemDTO
{
    public $name;
    public $path;
    
    public function __construct($name, $path)
    {
        $this->name = $name;
        $this->path = $path;
    }
    
}