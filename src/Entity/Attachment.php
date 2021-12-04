<?php

namespace App\Entity;

use App\Repository\AttachmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=AttachmentRepository::class)
 * @Vich\Uploadable
 */
class Attachment
{
    const IMAGES_PATH = 'img/our-works';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @var string|null
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="attachments", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="OurWorks", inversedBy="attachments")
     */
    private $our_works;

    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getOurWorks(): ?OurWorks
    {
        return $this->our_works;
    }

    public function setOurWorks(?OurWorks $our_works): self
    {
        if($our_works) {
            $fs = new Filesystem();
            $fs->mkdir(self::IMAGES_PATH . '/' . $our_works->getId());
        }
        $this->our_works = $our_works;


        return $this;
    }


    /**
     * @return mixed
     */
    public function getImageFile(){
        return $this->imageFile;
    }

    /**
     * @param mixed $imageFile
     * @throws \Exception
     */

    public function setImageFile($imageFile):void{
        $this->imageFile = $imageFile;
        if($imageFile){
            $this->updatedAt = new \DateTime();
        }
    }
    
}
