<?php

namespace App\Entity;

use App\Repository\AttachNashirabotyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=AttachNashirabotyRepository::class)
 * @Vich\Uploadable
 */
class AttachNashiraboty
{
    const IMAGES_PATH = 'img/naschiraboty';

    public function __construct(){
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="attach", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Naschiraboty::class, inversedBy="attach")
     */
    private $nashiraboty;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getNashiraboty(): ?Naschiraboty
    {
        return $this->nashiraboty;
    }

    public function setNashiraboty(?Naschiraboty $nashiraboty): self
    {
        if($nashiraboty) {
            $fs = new Filesystem();
            $fs->mkdir(self::IMAGES_PATH . '/' . $nashiraboty->getId());
        }
        $this->nashiraboty = $nashiraboty;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $this->updated_at = new \DateTime();
        }
    }
}
