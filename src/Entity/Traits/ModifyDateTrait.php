<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;


trait ModifyDateTrait
{
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="modify_date", type="datetime",columnDefinition="DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $modifyDate;
    
    public function getModifyDate(): ?\DateTimeInterface
    {
        if (null === $this->modifyDate) {
            $this->modifyDate = new \DateTime();
        }
        return $this->modifyDate;
    }
    
    public function setModifyDate(?\DateTimeInterface $modifyDate): self
    {
        $this->modifyDate = $modifyDate;
        
        return $this;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function changeModifyDate()
    {
        $this->modifyDate = new \DateTimeImmutable();
    }
}