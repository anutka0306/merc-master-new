<?php

namespace App\Entity;

use App\Repository\DayOfWeekRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DayOfWeekRepository::class)
 */
class DayOfWeek
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
     * @ORM\OneToMany(targetEntity=WorkingDay::class, mappedBy="dayOfWeek")
     */
    private $workingDays;

    public function __construct()
    {
        $this->workingDays = new ArrayCollection();
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

    public function __toString()
    {
        return (string)$this->getName();
    }

    /**
     * @return Collection|WorkingDay[]
     */
    public function getWorkingDays(): Collection
    {
        return $this->workingDays;
    }

    public function addWorkingDay(WorkingDay $workingDay): self
    {
        if (!$this->workingDays->contains($workingDay)) {
            $this->workingDays[] = $workingDay;
            $workingDay->setDayOfWeek($this);
        }

        return $this;
    }

    public function removeWorkingDay(WorkingDay $workingDay): self
    {
        if ($this->workingDays->contains($workingDay)) {
            $this->workingDays->removeElement($workingDay);
            // set the owning side to null (unless already changed)
            if ($workingDay->getDayOfWeek() === $this) {
                $workingDay->setDayOfWeek(null);
            }
        }

        return $this;
    }
}
