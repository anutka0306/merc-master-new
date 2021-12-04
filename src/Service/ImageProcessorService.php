<?php

namespace App\Service;

use Impulze\Bundle\InterventionImageBundle\ImageManager;

class ImageProcessorService
{
    /**
     * @var ImageManager
     */
    protected $image_manager;
    private $optimizer;
    
    public function __construct(ImageManager $image_manager)
    {
        $this->image_manager = $image_manager;
        
        $factory = new \ImageOptimizer\OptimizerFactory();
        $this->optimizer = $factory->get();
    }
    
    public function processImage($file, $max_width = null, $max_height = null, $watermark = null,$quality = null)
    {
        $image = $this->image_manager->make($file);
        if ($max_width || $max_height) {
            
            if ($max_width && ! $max_height) {
                $image->widen($max_width);
            }elseif(!$max_width && $max_height){
                $image->heighten($max_height);
            }else{
                $image->fit($max_width,$max_height);
            }
        }
        if ($watermark) {
            $image->insert($watermark,'center');
        }
        $image->save($file);
        
        $this->optimize($file);
        if ($quality) {
            $this->setQuality($file,$quality);
        }
    }
    
    public function optimize($file)
    {
        $this->optimizer->optimize($file);
    }
    
    public function setQuality($file,$quality):void
    {
        
        $img = new \Imagick();
        $img->readImage($file);
        $mime = $img->getImageMimeType();
        if ($mime !== 'image/jpeg') {
            unset($img);
            return;
        }
        $img->setImageCompression(\Imagick::COMPRESSION_JPEG);
        $img->setImageCompressionQuality($quality);
        $img->stripImage();
        $img->writeImage($file);
    }
}