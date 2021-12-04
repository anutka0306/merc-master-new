<?php

namespace App\Entity;

use App\Repository\SubwayStationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubwayStationRepository::class)
 */
class SubwayStation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=SubwayLine::class, inversedBy="subwayStations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subwayLine;

    /**
     * @ORM\ManyToMany(targetEntity=Salon::class, mappedBy="subwayStations")
     */
    private $salons;

    /**
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $code;

    public function __construct()
    {
        $this->salons = new ArrayCollection();
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

    public function getSubwayLine(): ?SubwayLine
    {
        return $this->subwayLine;
    }

    public function setSubwayLine(?SubwayLine $subwayLine): self
    {
        $this->subwayLine = $subwayLine;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * @return Collection|Salon[]
     */
    public function getSalons(): Collection
    {
        return $this->salons;
    }

    public function addSalon(Salon $salon): self
    {
        if (!$this->salons->contains($salon)) {
            $this->salons[] = $salon;
            $salon->addSubwayStation($this);
        }

        return $this;
    }

    public function removeSalon(Salon $salon): self
    {
        if ($this->salons->contains($salon)) {
            $this->salons->removeElement($salon);
            $salon->removeSubwayStation($this);
        }

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }
}
