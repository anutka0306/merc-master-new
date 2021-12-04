<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
     * @ORM\Column(type="boolean", options={"default": 0})
     */
    private $mainCity = false;

    /**
     * @ORM\OneToMany(targetEntity=Salon::class, mappedBy="city")
     */
    private $salons;

    /**
     * @ORM\OneToMany(targetEntity=District::class, mappedBy="city")
     */
    private $districts;

    /**
     * @ORM\OneToMany(targetEntity=SubwayLine::class, mappedBy="city")
     */
    private $subwayLines;

    /**
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $code;

    public function __construct()
    {
        $this->salons = new ArrayCollection();
        $this->districts = new ArrayCollection();
        $this->subwayLines = new ArrayCollection();
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

    public function getMainCity(): ?bool
    {
        return $this->mainCity;
    }

    public function setMainCity(bool $mainCity): self
    {
        $this->mainCity = $mainCity;

        return $this;
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
            $salon->setCity($this);
        }

        return $this;
    }

    public function removeSalon(Salon $salon): self
    {
        if ($this->salons->contains($salon)) {
            $this->salons->removeElement($salon);
            // set the owning side to null (unless already changed)
            if ($salon->getCity() === $this) {
                $salon->setCity(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * @return Collection|District[]
     */
    public function getDistricts(): Collection
    {
        return $this->districts;
    }

    public function addDistrict(District $district): self
    {
        if (!$this->districts->contains($district)) {
            $this->districts[] = $district;
            $district->setCity($this);
        }

        return $this;
    }

    public function removeDistrict(District $district): self
    {
        if ($this->districts->contains($district)) {
            $this->districts->removeElement($district);
            // set the owning side to null (unless already changed)
            if ($district->getCity() === $this) {
                $district->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubwayLine[]
     */
    public function getSubwayLines(): Collection
    {
        return $this->subwayLines;
    }

    public function addSubwayLine(SubwayLine $subwayLine): self
    {
        if (!$this->subwayLines->contains($subwayLine)) {
            $this->subwayLines[] = $subwayLine;
            $subwayLine->setCity($this);
        }

        return $this;
    }

    public function removeSubwayLine(SubwayLine $subwayLine): self
    {
        if ($this->subwayLines->contains($subwayLine)) {
            $this->subwayLines->removeElement($subwayLine);
            // set the owning side to null (unless already changed)
            if ($subwayLine->getCity() === $this) {
                $subwayLine->setCity(null);
            }
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
