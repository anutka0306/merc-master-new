<?php

namespace App\Dto;

class PageDto
{
    public $path;
    public $modifyDate;
    
    /**
     * PageDto constructor.
     *
     * @param $path
     * @param $modifyDate
     */
    public function __construct($path, $modifyDate)
    {
        $this->path       = $path;
        $this->modifyDate = $modifyDate;
    }
    
}