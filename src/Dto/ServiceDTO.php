<?php

namespace App\Dto;

class ServiceDTO
{
    public $name;
    public $link;
    public $img;
    public $price;
    public $text;
    
    public function __construct($name, $link, $img, $price = 1500, $text = '')
    {
        $this->name  = $name;
        $this->link  = $link;
        $this->img   = 'img/service_menu/'.$img;
        $this->price = $price;
        $this->text  = $text;
    }
}