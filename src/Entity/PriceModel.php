<?php

namespace App\Entity;

use App\Entity\Traits\VichImagePropertyNamerTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * PriceModel
 *
 * @ORM\Table(name="price__model", indexes={@ORM\Index(name="brand_id", columns={"brand_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\PriceModelRepository")
 * @ORM\EntityListeners({"App\Doctrine\GeneratePagesByPriceModelListener"})
 * @Vich\Uploadable
 */
class PriceModel
{
    use VichImagePropertyNamerTrait;

    public const TYPE_NOT_SPECIFIED = 0;
    public const TYPE_SEDAN = 1;
    public const TYPE_HATCHBACK = 2;
    public const TYPE_CROSSOVER = 3;
    public const TYPE_SUV = 4;
    public const TYPE_VAN = 5;

    public const TYPES = [
        'Не указан' => self::TYPE_NOT_SPECIFIED,
        'Седан' => self::TYPE_SEDAN,
        'Хэтчбек' => self::TYPE_HATCHBACK,
        'Кроссовер' => self::TYPE_CROSSOVER,
        'Внедорожник' => self::TYPE_SUV,
        'Фургон' => self::TYPE_VAN,
    ];

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PriceClass")
     * @ORM\JoinColumn(nullable=false,name="class")
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @var PriceBrand
     *
     * @ORM\ManyToOne(targetEntity="PriceBrand",inversedBy="priceModels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $priceBrand;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BeforeAfter", mappedBy="priceModel")
     */
    private $beforeAfterImages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameRus;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Salon", mappedBy="excludedModels")
     */
    private $excludedSalons;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     * @var bool
     */
    private $popular = false;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     * @var int
     */
    private $type = 0;

    /**
     * @ORM\Column(type="float")
     */
    private $increase;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo_big;

    /**
     * @ORM\OneToMany(targetEntity=Naschiraboty::class, mappedBy="model")
     */
    private $naschiraboty;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name_short;

    public function __construct()
    {
        $this->beforeAfterImages = new ArrayCollection();
        $this->excludedSalons = new ArrayCollection();
        $this->naschiraboty = new ArrayCollection();
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

    public function getClass(): ?PriceClass
    {
        return $this->class;
    }

    public function setClass(?PriceClass $class): self
    {
        $this->class = $class;

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

    public function getPriceBrand(): ?PriceBrand
    {
        return $this->priceBrand;
    }

    public function setPriceBrand(?PriceBrand $priceBrand): self
    {
        $this->priceBrand = $priceBrand;

        return $this;
    }
    
    public function getPath():string
    {
        return '/'. $this->getCode().'/';
    }

    public function __toString()
    {
        return (string)$this->getPriceBrand()->getName().' '.$this->name;
    }

    /**
     * @return Collection|BeforeAfter[]
     */
    public function getBeforeAfterImages(): Collection
    {
        return $this->beforeAfterImages;
    }

    public function addBeforeAfterImage(BeforeAfter $beforeAfterImage): self
    {
        if (!$this->beforeAfterImages->contains($beforeAfterImage)) {
            $this->beforeAfterImages[] = $beforeAfterImage;
            $beforeAfterImage->setPriceModel($this);
        }

        return $this;
    }

    public function removeBeforeAfterImage(BeforeAfter $beforeAfterImage): self
    {
        if ($this->beforeAfterImages->contains($beforeAfterImage)) {
            $this->beforeAfterImages->removeElement($beforeAfterImage);
            // set the owning side to null (unless already changed)
            if ($beforeAfterImage->getPriceModel() === $this) {
                $beforeAfterImage->setPriceModel(null);
            }
        }

        return $this;
    }

    public function getNameRus(): ?string
    {
        return $this->nameRus;
    }

    public function setNameRus(?string $nameRus): self
    {
        $this->nameRus = $nameRus;

        return $this;
    }
    
    public function getBrandModelName()
    {
        return $this->getPriceBrand()->getName().' '. $this->getName();
    }
    
    public function getBrandModelWithTranslation()
    {
        return $this->getBrandModelName().' ('. $this->getPriceBrand()->getNameRus().' '.$this->getNameRus().')';
    }

    /**
     * @return Collection|Salon[]
     */
    public function getExcludedSalons(): Collection
    {
        return $this->excludedSalons;
    }

    public function addExcludedSalon(Salon $excludedSalon): self
    {
        if (!$this->excludedSalons->contains($excludedSalon)) {
            $this->excludedSalons[] = $excludedSalon;
            $excludedSalon->addExcludedModel($this);
        }

        return $this;
    }

    public function removeExcludedSalon(Salon $excludedSalon): self
    {
        if ($this->excludedSalons->contains($excludedSalon)) {
            $this->excludedSalons->removeElement($excludedSalon);
            $excludedSalon->removeExcludedModel($this);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getImgFolder(): string
    {
        return sprintf("img/models/%s/", $this->getPriceBrand()->getAlias());
    }

    /**
     * @return string
     */
    public function getImgName(): string
    {
        return $this->getCode();
    }

    /**
     * @return bool
     */
    public function isPopular(): bool
    {
        return $this->popular;
    }

    /**
     * @param bool $popular
     * @return $this
     */
    public function setPopular(bool $popular): self
    {
        $this->popular = $popular;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return $this
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getTypeName():string
    {
        return array_flip(self::TYPES)[$this->type] ?? 'Не указан';
    }

    public function getIncrease(): ?float
    {
        return $this->increase;
    }

    public function setIncrease(float $increase): self
    {
        $this->increase = $increase;

        return $this;
    }

    public function getPopular(): ?bool
    {
        return $this->popular;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPhotoBig(): ?string
    {
        return $this->photo_big;
    }

    public function setPhotoBig(?string $photo_big): self
    {
        $this->photo_big = $photo_big;

        return $this;
    }

    /**
     * @return Collection|Naschiraboty[]
     */
    public function getNaschiraboty(): Collection
    {
        return $this->naschiraboty;
    }

    public function addNaschiraboty(Naschiraboty $naschiraboty): self
    {
        if (!$this->naschiraboty->contains($naschiraboty)) {
            $this->naschiraboty[] = $naschiraboty;
            $naschiraboty->setModel($this);
        }

        return $this;
    }

    public function removeNaschiraboty(Naschiraboty $naschiraboty): self
    {
        if ($this->naschiraboty->removeElement($naschiraboty)) {
            // set the owning side to null (unless already changed)
            if ($naschiraboty->getModel() === $this) {
                $naschiraboty->setModel(null);
            }
        }

        return $this;
    }

    public function getNameShort(): ?string
    {
        return $this->name_short;
    }

    public function setNameShort(?string $name_short): self
    {
        $this->name_short = $name_short;

        return $this;
    }
}
