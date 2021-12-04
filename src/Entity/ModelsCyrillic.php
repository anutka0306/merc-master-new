<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelsCyrillic
 *
 * @ORM\Table(name="models_cyrillic", indexes={@ORM\Index(name="parent_id", columns={"parent_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ModelsCyrillicRepository")
 */
class ModelsCyrillic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=256, nullable=false)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="name_ru", type="string", length=256, nullable=false)
     */
    private $nameRu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function setNameEn(string $nameEn): self
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    public function getNameRu(): ?string
    {
        return $this->nameRu;
    }

    public function setNameRu(string $nameRu): self
    {
        $this->nameRu = $nameRu;

        return $this;
    }


}
