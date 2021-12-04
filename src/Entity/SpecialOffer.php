<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use App\Entity\Traits\SeoTrait;
use App\Entity\Traits\VichImageTrait;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialOfferRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class SpecialOffer implements PageInterface
{
    use VichImageTrait;
    use SeoTrait;

    public const BASE_PATH = '/offers/';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $old_price=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $new_price=0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published=true;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordering=0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getOldPrice(): ?int
    {
        return $this->old_price;
    }

    public function setOldPrice(int $old_price): self
    {
        $this->old_price = $old_price;

        return $this;
    }

    public function getNewPrice(): ?int
    {
        return $this->new_price;
    }

    public function setNewPrice(int $new_price): self
    {
        $this->new_price = $new_price;

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getOrdering(): ?int
    {
        return $this->ordering;
    }

    public function setOrdering(int $ordering): self
    {
        $this->ordering = $ordering;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Example:
     * return 'img/product/';
     * @return string
     */
    public function getImgFolder(): string
    {
        return 'img/special-offers/';
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return self::BASE_PATH. $this->getSlug().'/';
    }

    /**
     * @return PageInterface|string
     */
    public function getParent()
    {
        return self::BASE_PATH;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
