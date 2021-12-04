<?php

namespace App\Entity;

use App\Entity\Traits\ModifyDateTrait;
use App\Entity\Traits\PriceServicesListTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeforeAfterRepository")
 * @ORM\Table(name="before_after")
 * @Vich\Uploadable
 */
class BeforeAfter
{
    use PriceServicesListTrait;
    use ModifyDateTrait;

    public const IMAGES_PATH = 'img/before-after';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PriceModel", inversedBy="beforeAfterImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $priceModel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PriceService", inversedBy="beforeAfterImages")
     */
    private $priceServices;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $beforeImg;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $afterImg;
    /**
     * @Vich\UploadableField(mapping="web_root_property_namer_before", fileNameProperty="beforeImg")
     * @var File
     */
    private $beforeFile;
    /**
     * @Vich\UploadableField(mapping="web_root_property_namer_after", fileNameProperty="afterImg")
     * @var File
     */
    private $afterFile;

    public function __construct()
    {
        $this->priceServices = new ArrayCollection();
        $this->modifyDate = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceBrand(): ?PriceBrand
    {
        return $this->getPriceModel()->getPriceBrand();
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

    public function getBeforeImg(): ?string
    {
        return $this->beforeImg;
    }

    public function setBeforeImg(?string $beforeImg): self
    {
        $this->beforeImg = $beforeImg;

        return $this;
    }

    public function getAfterImg(): ?string
    {
        return $this->afterImg;
    }

    public function setAfterImg(?string $afterImg): self
    {
        $this->afterImg = $afterImg;

        return $this;
    }

    public function getImgFolder(): string
    {
        return sprintf('%s/%d/',
            self::IMAGES_PATH,
            $this->getId()
        );
    }

    public function getBeforeFile(): ?File
    {
        return $this->beforeFile;
    }

    public function getAfterFile(): ?File
    {
        return $this->afterFile;
    }

    public function setBeforeFile(File $beforeFile = null): void
    {
        $this->beforeFile = $beforeFile;
        if ($beforeFile) {
            $this->modifyDate = new \DateTime('now');
        }
    }

    public function setAfterFile(File $afterFile = null): void
    {
        $this->afterFile = $afterFile;
        if ($afterFile) {
            $this->modifyDate = new \DateTime('now');
        }
    }

    public function getBeforeImgUrl(): string
    {
        if (!$this->getBeforeImg()) {
            return '';
        }
        return '/' . $this->getImgFolder() . $this->getBeforeImg();
    }

    public function getAfterImgUrl(): string
    {
        if (!$this->getAfterImg()) {
            return '';
        }
        return '/' . $this->getImgFolder() . $this->getAfterImg();
    }

    public function getImgNameBefore(): string
    {
        return 'before';
    }

    public function getImgNameAfter(): string
    {
        return 'after';
    }

    public function __toString()
    {
        return (string)$this->getBeforeImg();
    }
}
