<?php

namespace App\Entity;

use App\Repository\SubwayLineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubwayLineRepository::class)
 */
class SubwayLine
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
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $hexColor;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="subwayLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=SubwayStation::class, mappedBy="subwayLine")
     */
    private $subwayStations;

    public function __construct()
    {
        $this->subwayStations = new ArrayCollection();
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

    public function getHexColor(): ?string
    {
        return $this->hexColor;
    }

    public function setHexColor(string $hexColor): self
    {
        $this->hexColor = $hexColor;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * @return Collection|SubwayStation[]
     */
    public function getSubwayStations(): Collection
    {
        return $this->subwayStations;
    }

    public function addSubwayStation(SubwayStation $subwayStation): self
    {
        if (!$this->subwayStations->contains($subwayStation)) {
            $this->subwayStations[] = $subwayStation;
            $subwayStation->setSubwayLine($this);
        }

        return $this;
    }

    public function removeSubwayStation(SubwayStation $subwayStation): self
    {
        if ($this->subwayStations->contains($subwayStation)) {
            $this->subwayStations->removeElement($subwayStation);
            // set the owning side to null (unless already changed)
            if ($subwayStation->getSubwayLine() === $this) {
                $subwayStation->setSubwayLine(null);
            }
        }

        return $this;
    }
}
