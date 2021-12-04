<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="price__class")
 * @ORM\Entity(repositoryClass="App\Repository\PriceClassRepository")
 */
class PriceClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceOfHour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceOfHour(): ?int
    {
        return $this->priceOfHour;
    }

    public function setPriceOfHour(int $priceOfHour): self
    {
        $this->priceOfHour = $priceOfHour;

        return $this;
    }

    public function __toString():string
    {
        return (string)$this->priceOfHour;
    }
}
