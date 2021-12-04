<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewsRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Reviews implements PageInterface
{
    use Traits\SeoTrait;
    use Traits\VichImageTrait;

    public const BASE_PATH = '/reviews/';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autor;

    /**
     * @ORM\Column(type="integer")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $ocenka;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = true;

    public function __construct()
    {
        $this->date = time();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getOcenka(): ?int
    {
        return $this->ocenka;
    }

    public function setOcenka(int $ocenka): self
    {
        $this->ocenka = $ocenka;

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

    public function getPath(): string
    {
        return self::BASE_PATH . $this->getId() . '/';
    }

    /**
     * @return string|PageInterface
     */
    public function getParent()
    {
        return self::BASE_PATH;
    }

    public function getMetaTitle(): ?string
    {
        if ($this->metaTitle) {
            return $this->metaTitle;
        }
        if ($this->autor) {
            return sprintf("Отзывы о «ДетейлингофЪ». Автор - %s", $this->autor);
        }
        return null;
    }

    public function getH1(): ?string
    {
        if ($this->h1) {
            return $this->h1;
        }
        if ($this->date && $this->id) {
            return sprintf('Отзыв клиента №%d: от %s', $this->id, date('d.m.Y', $this->date));
        }
        return null;
    }

    public function getMetaDescription(): ?string
    {
        if ($this->metaDescription) {
            return $this->metaDescription;
        }
        if ($this->id && $this->autor && $this->date && $this->ocenka) {
            return sprintf("Настоящий отзыв нашего клиента. Оставил %s. №%s от %s с оценкой %s из 5. На странице присутствует фотография данного отзыва, подтверждающая его «реальность».",
                $this->autor, $this->id, date('d.m.Y', $this->date), $this->ocenka);
        }
        return null;
    }

    public function getName(): ?string
    {
        if ($this->date) {
            return sprintf('Отзыв от %s', date('d.m.Y', $this->date));
        }
        return null;
    }

    /**
     * Example:
     * return 'img/product/';
     * @return string
     */
    public function getImgFolder(): string
    {
        return 'img/reviews/original/';
    }
}
