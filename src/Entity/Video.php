<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use App\Entity\Traits\PriceServicesListTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Video implements PageInterface
{
    use PriceServicesListTrait;
    use Traits\SeoTrait;
    use Traits\RatingTrait;
    use Traits\VichImageTrait;
    const MIN_RATING_VALUE = 4.6;
    const MAX_RATING_VALUE = 4.9;
    const MIN_RATING_COUNT = 7;
    const MAX_RATING_COUNT = 22;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PriceModel")
     */
    private $priceModel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PriceService")
     */
    private $priceServices;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VideoCategory", inversedBy="videos")
     */
    private $category;


    public function __construct()
    {
        $this->priceServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getPriceModel(): ?PriceModel
    {
        return $this->priceModel;
    }

    public function setPriceModel(?PriceModel $priceModel): self
    {
        $this->priceModel = $priceModel;

        return $this;
    }

    /**
     * @return Collection|PriceService[]
     */
    public function getPriceServices(): Collection
    {
        return $this->priceServices;
    }

    public function addPriceService(PriceService $priceService): self
    {
        if (!$this->priceServices->contains($priceService)) {
            $this->priceServices[] = $priceService;
        }

        return $this;
    }

    public function removePriceService(PriceService $priceService): self
    {
        if ($this->priceServices->contains($priceService)) {
            $this->priceServices->removeElement($priceService);
        }

        return $this;
    }
    
    public function getPriceBrand(): ?PriceBrand
    {
        return $this->getPriceModel()->getPriceBrand();
    }

    public function getCategory(): ?VideoCategory
    {
        return $this->category;
    }

    public function setCategory(?VideoCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPath(): string
    {
        return $this->getCategory()?($this->getCategory()->getPath(). $this->getId()):'';
    }

    /**
     * @return string|PageInterface
     */
    public function getParent()
    {
        return $this->getCategory()?:VideoCategory::BASE_PATH;
    }

    /**
     * Example:
     * return 'img/product/';
     * @return string
     */
    public function getImgFolder(): string
    {
        return 'video/blog/';
    }
}
