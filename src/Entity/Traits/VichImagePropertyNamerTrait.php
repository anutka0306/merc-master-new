<?php

namespace App\Entity\Traits;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
trait VichImagePropertyNamerTrait
{
    use ModifyDateTrait;

    private $image;
    /**
     * @Vich\UploadableField(mapping="web_root_property_namer", fileNameProperty="image")
     * @var File
     */
    protected $imageFile;
    
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->modifyDate = new \DateTime('now');
        }
    }
    
    public function getImageFile()
    {
        return $this->imageFile;
    }
    
    /**
     * Example:
     * return 'img/product/';
     * @return string
     */
    abstract public function getImgFolder():string;
    /**
     * Example:
     * return $this->getSlug();
     * @return string
     */
    abstract public function getImgName():string;
    
    public function getImageUrl(): string
    {
        $base_file_name = $this->getImgFolder().$this->getImgName();
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $base_file_name . '.jpg')) {
            return $base_file_name . '.jpg';
        }
        return $base_file_name . '.png';
    }

    public function getImage(): string
    {
        return pathinfo($this->getImageUrl(),PATHINFO_BASENAME);
    }

    public function setImage(?string $image): self
    {
        return $this;
    }
}