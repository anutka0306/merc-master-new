<?php

namespace App\Entity;

use App\Repository\WorkingDayRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=WorkingDayRepository::class)
 * @UniqueEntity(
 *     fields={"dayOfWeek", "salon"},
 *     errorPath="dayOfWeek",
 *     message="This day of the week is already filled for this salon"
 * )
 */
class WorkingDay
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=DayOfWeek::class, inversedBy="workingDays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dayOfWeek;

    /**
     * @ORM\ManyToOne(targetEntity=Salon::class, inversedBy="workingDays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salon;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $workingHoursFrom;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $workingHoursTo;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $dayOff;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayOfWeek(): ?DayOfWeek
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(?DayOfWeek $dayOfWeek): self
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    public function getSalon(): ?Salon
    {
        return $this->salon;
    }

    public function setSalon(?Salon $salon): self
    {
        $this->salon = $salon;

        return $this;
    }

    public function getWorkingHoursFrom(): ?string
    {
        return $this->workingHoursFrom;
    }

    public function setWorkingHoursFrom(?string $workingHoursFrom): self
    {
        $this->workingHoursFrom = $workingHoursFrom;

        return $this;
    }

    public function getWorkingHoursTo(): ?string
    {
        return $this->workingHoursTo;
    }

    public function setWorkingHoursTo(?string $workingHoursTo): self
    {
        $this->workingHoursTo = $workingHoursTo;

        return $this;
    }

    public function getDayOff(): ?bool
    {
        return $this->dayOff;
    }

    public function setDayOff(bool $dayOff): self
    {
        $this->dayOff = $dayOff;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getDayOfWeek()->getName();
    }
}
