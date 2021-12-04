<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;

class ImagesService
{
    private $kernel;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
    
    function saveToDisk(UploadedFile $image,$uploadDirectory='',$imageName='') {
        
        if ( ! $uploadDirectory) {
            $uploadDirectory = 'img/uploads/'.date("Y/m/d");
        }
        if ( ! $imageName) {
            $imageName = $image->getClientOriginalName();
        }
        $path = $this->kernel->getProjectDir().'/public_html/' . $uploadDirectory;
        $image->move($path, $imageName);
        return '/'. $uploadDirectory. '/' . $imageName;
    }
}