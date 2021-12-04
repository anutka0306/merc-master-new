<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Faq
 *
 * @ORM\Table(name="faq")
 * @ORM\Entity(repositoryClass="App\Repository\FaqRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Faq implements PageInterface
{
    use Traits\ModifyDateTrait;
    use Traits\SeoTrait;

    public const BASE_PATH = '/faq/';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=250, nullable=false)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="email_autor", type="string", length=250, nullable=false)
     */
    private $emailAutor;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="otvet_admin", type="text", length=65535, nullable=false)
     */
    private $otvetAdmin;

    /**
     * @var int
     *
     * @ORM\Column(name="count_views", type="integer", nullable=false)
     */
    private $countViews = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count_like", type="integer", nullable=false)
     */
    private $countLike = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count_dislike", type="integer", nullable=false)
     */
    private $countDislike = '0';

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = true;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getEmailAutor(): ?string
    {
        return $this->emailAutor;
    }

    public function setEmailAutor(string $emailAutor): self
    {
        $this->emailAutor = $emailAutor;

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

    public function getOtvetAdmin(): ?string
    {
        return $this->otvetAdmin;
    }

    public function setOtvetAdmin(string $otvetAdmin): self
    {
        $this->otvetAdmin = $otvetAdmin;

        return $this;
    }

    public function getCountViews(): ?int
    {
        return $this->countViews;
    }

    public function setCountViews(int $countViews): self
    {
        $this->countViews = $countViews;

        return $this;
    }

    public function getCountLike(): ?int
    {
        return $this->countLike;
    }

    public function setCountLike(int $countLike): self
    {
        $this->countLike = $countLike;

        return $this;
    }

    public function getCountDislike(): ?int
    {
        return $this->countDislike;
    }

    public function setCountDislike(int $countDislike): self
    {
        $this->countDislike = $countDislike;

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
        if ($this->name && $this->autor) {
            return sprintf('Вопрос от %s: %s',$this->autor,$this->name);
        }
        return null;
    }

    public function getMetaDescription(): ?string
    {
        if ($this->metaDescription) {
            return $this->metaDescription;
        }
        if ($this->text) {
            return $this->text;
        }
        return null;
    }
}
