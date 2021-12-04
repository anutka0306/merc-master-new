<?php

namespace App\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WatermarkService
{
    public function addWatermark($target, $watermark,$quality=100)
    {
        if(!file_exists($watermark)) {
            throw new NotFoundHttpException('Не найден файл водяного знака - '.$watermark);
        }
        if(!file_exists($target)) {
            throw new NotFoundHttpException('Не найдено изображение для наложения водяного знака - '.$watermark);
        }
        
        $main_img = getimagesize($target);
    
        switch($main_img['mime']) {
            case 'image/jpeg':
            case 'image/pjpeg':
                $img = imagecreatefromjpeg($target);
                break;
        
            case 'image/png':
            case 'image/x-png':
                $img = imagecreatefrompng($target);
                break;
        
            case 'image/gif':
                $img = imagecreatefromgif($target);
                break;
            default:
                throw new NotFoundHttpException('Некорректное изображение для наложения водяного знака - '.$target.'. Тип - '.$main_img['mime']);
                
        }
        
        $water = imagecreatefrompng($watermark);
        
    
        $res_width = $main_img[0];
        $res_height = $main_img[1];
    
        $water_width = imagesx($water);
        $water_height = imagesy($water);
    
        $res_img = imagecreatetruecolor($res_width,$res_height);
    
        imagecopyresampled($res_img,$img,0,0,0,0,$res_width,$res_height,$main_img[0],$main_img[1]);
    
        imagecopy($res_img,$water,$res_width-$water_width,$res_height-$water_height,0,0,$water_width,$water_height);
        
        imagejpeg($res_img,$target,$quality);
        return true;
    }
}