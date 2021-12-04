<?php

namespace App\Entity;

use App\Repository\MenuTopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuTopRepository::class)
 */
class MenuTop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Content::class, inversedBy="top_menu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $link;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ordering;

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

    public function getLink(): ?Content
    {
        return $this->link;
    }

    public function setLink(?Content $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getOrdering(): ?int
    {
        return $this->ordering;
    }

    public function setOrdering(?int $ordering): self
    {
        $this->ordering = $ordering;

        return $this;
    }
}
