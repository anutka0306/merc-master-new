<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class News implements PageInterface
{
    use Traits\ModifyDateTrait;

    public const BASE_PATH = '/news/';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meta_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meta_description;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $sort;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $images;

    /**
     * @ORM\Column(type="text")
     */
    private $short_text;

    /**
     * @ORM\Column(type="integer")
     */
    private $count_views=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $count_like=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $count_dislike=0;

    public function __construct()
    {
        $this->date = time();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->meta_title;
    }

    public function setMetaTitle(string $meta_title): self
    {
        $this->meta_title = $meta_title;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->meta_description;
    }

    public function setMetaDescription(string $meta_description): self
    {
        $this->meta_description = $meta_description;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function getImagesArray(): ?array
    {
        if ( ! $this->images) {
            return [];
        }
        $images = explode('|',$this->images);
        foreach ($images as &$image) {
            $image =strstr($image,'<<<',true);
        }
        return $images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getShortText(): ?string
    {
        return $this->short_text;
    }

    public function setShortText(string $short_text): self
    {
        $this->short_text = $short_text;

        return $this;
    }

    public function getCountViews(): ?int
    {
        return $this->count_views;
    }

    public function setCountViews(int $count_views): self
    {
        $this->count_views = $count_views;

        return $this;
    }

    public function getCountLike(): ?int
    {
        return $this->count_like;
    }

    public function setCountLike(int $count_like): self
    {
        $this->count_like = $count_like;

        return $this;
    }

    public function getCountDislike(): ?int
    {
        return $this->count_dislike;
    }

    public function setCountDislike(int $count_dislike): self
    {
        $this->count_dislike = $count_dislike;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPath(): ?string
    {
        return self::BASE_PATH . $this->getId() . '/';
    }

    public function getH1(): ?string
    {
        return $this->getName();
    }

    public function getBrandName(): string
    {
        return '';
    }

    /**
     * Возвращает путь из таблицы content или объект PageInterface
     * @return string|PageInterface
     */
    public function getParent()
    {
        return self::BASE_PATH;
    }

    public function getBrandAndModelName(): string
    {
        return '';
    }
}
