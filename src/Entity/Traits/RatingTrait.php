<?php

namespace App\Entity\Traits;

trait RatingTrait
{
    
    public function getRandomRatingValue():float
    {
        $min = self::MIN_RATING_VALUE * 10;
        $max = self::MAX_RATING_VALUE * 10;
        return rand($min,$max)/10;
    }
    
    public function getRandomRatingCount():int
    {
        return rand(self::MIN_RATING_COUNT,self::MAX_RATING_COUNT);
    }

    public function setRandomRatingValue(): self
    {
        $this->ratingValue = $this->getRandomRatingValue();

        return $this;
    }

    public function setRandomRatingCount(): self
    {
        $this->ratingCount = $this->getRandomRatingCount();

        return $this;
    }
    
    /**
     * @var float
     *
     * @ORM\Column(name="rating_value", type="float", precision=2, scale=1, nullable=false, options={"default"="4.8"})
     */
    protected $ratingValue;
    
    /**
     * @var int
     *
     * @ORM\Column(name="rating_count", type="integer", nullable=false, options={"default"="12","unsigned"=true})
     */
    protected $ratingCount;
    
    public function getRatingValue(): ?float
    {
        return $this->ratingValue;
    }
    
    public function setRatingValue(float $ratingValue): self
    {
        $this->ratingValue = $ratingValue;
        
        return $this;
    }
    
    public function getRatingCount(): ?int
    {
        return $this->ratingCount;
    }
    
    public function setRatingCount(int $ratingCount): self
    {
        $this->ratingCount = $ratingCount;
        
        return $this;
    }
}