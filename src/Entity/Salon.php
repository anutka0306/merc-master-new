<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\ModifyDateTrait;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalonRepository")
 * @Vich\Uploadable
 */
class Salon
{
	use ModifyDateTrait;

    const IMAGES_PATH = 'img/salon';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $workingHoursFrom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $workingHoursTo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PriceBrand", inversedBy="excludedSalons")
     */
    private $excludedBrands;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PriceModel", inversedBy="excludedSalons")
     */
    private $excludedModels;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PriceService", inversedBy="excludedSalons")
     */
    private $excludedServices;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $waPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $yandexTarget;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mangoId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yandexMapLink;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yandexNavigatorLink;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $googleMapLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slogan;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $videoLink;

    private $avatar;
    
    /**
     * @Vich\UploadableField(mapping="web_root_avatar", fileNameProperty="avatar")
     * @var File
     */
    protected $avatarFile;

    /**
     * @ORM\Column(type="boolean", options={"default": 1})
     */
    private $published = true;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="salons")
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity=District::class, inversedBy="salons")
     */
    private $districts;

    /**
     * @ORM\ManyToMany(targetEntity=SubwayStation::class, inversedBy="salons")
     */
    private $subwayStations;

    /**
     * @ORM\OneToMany(targetEntity=WorkingDay::class, mappedBy="salon", orphanRemoval=true,cascade={"persist", "remove"})
     */
    private $workingDays;
    
    public function __construct()
    {
        $this->excludedBrands = new ArrayCollection();
        $this->excludedModels = new ArrayCollection();
        $this->excludedServices = new ArrayCollection();
        $this->districts = new ArrayCollection();
        $this->subwayStations = new ArrayCollection();
        $this->workingDays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getWorkingHoursFrom(): ?string
    {
        return $this->workingHoursFrom;
    }

    public function setWorkingHoursFrom(string $workingHoursFrom): self
    {
        $this->workingHoursFrom = $workingHoursFrom;

        return $this;
    }

    public function getWorkingHoursTo(): ?string
    {
        return $this->workingHoursTo;
    }

    public function setWorkingHoursTo(string $workingHoursTo): self
    {
        $this->workingHoursTo = $workingHoursTo;

        return $this;
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

    public function getMetro(): ?string
    {
        return $this->metro;
    }

    public function setMetro(?string $metro): self
    {
        $this->metro = $metro;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return Collection|PriceBrand[]
     */
    public function getExcludedBrands(): Collection
    {
        return $this->excludedBrands;
    }

    public function addExcludedBrand(PriceBrand $excludedBrand): self
    {
        if (!$this->excludedBrands->contains($excludedBrand)) {
            $this->excludedBrands[] = $excludedBrand;
        }

        return $this;
    }

    public function removeExcludedBrand(PriceBrand $excludedBrand): self
    {
        if ($this->excludedBrands->contains($excludedBrand)) {
            $this->excludedBrands->removeElement($excludedBrand);
        }

        return $this;
    }

    /**
     * @return Collection|PriceModel[]
     */
    public function getExcludedModels(): Collection
    {
        return $this->excludedModels;
    }

    public function addExcludedModel(PriceModel $excludedModel): self
    {
        if (!$this->excludedModels->contains($excludedModel)) {
            $this->excludedModels[] = $excludedModel;
        }

        return $this;
    }

    public function removeExcludedModel(PriceModel $excludedModel): self
    {
        if ($this->excludedModels->contains($excludedModel)) {
            $this->excludedModels->removeElement($excludedModel);
        }

        return $this;
    }

    /**
     * @return Collection|PriceService[]
     */
    public function getExcludedServices(): Collection
    {
        return $this->excludedServices;
    }

    public function addExcludedService(PriceService $excludedService): self
    {
        if (!$this->excludedServices->contains($excludedService)) {
            $this->excludedServices[] = $excludedService;
        }

        return $this;
    }

    public function removeExcludedService(PriceService $excludedService): self
    {
        if ($this->excludedServices->contains($excludedService)) {
            $this->excludedServices->removeElement($excludedService);
        }

        return $this;
    }

    public function getPhoneDigits():string
    {
        if (!$this->getPhone()) {
            return '';
        }
        $phone = preg_replace('/\D/','',$this->getPhone());
        /*if (7 == $phone{0}) {
            $phone = '+'.$phone;
        }*/
        return $phone;
    }

    public function __toString():string
    {
        return (string)$this->getName();
    }

    public function getWaPhone(): ?string
    {
        return $this->waPhone;
    }

    public function setWaPhone(?string $waPhone): self
    {
        $this->waPhone = $waPhone;

        return $this;
    }

    public function getYandexTarget(): ?string
    {
        return $this->yandexTarget;
    }

    public function setYandexTarget(?string $yandexTarget): self
    {
        $this->yandexTarget = $yandexTarget;

        return $this;
    }

    public function getMangoId(): ?int
    {
        return $this->mangoId;
    }

    public function setMangoId(?int $mangoId): self
    {
        $this->mangoId = $mangoId;

        return $this;
    }

    public function getYandexMapLink(): ?string
    {
        return $this->yandexMapLink;
    }

    public function setYandexMapLink(?string $yandexMapLink): self
    {
        $this->yandexMapLink = $yandexMapLink;

        return $this;
    }

    public function getYandexNavigatorLink(): ?string
    {
        return $this->yandexNavigatorLink;
    }

    public function setYandexNavigatorLink(?string $yandexNavigatorLink): self
    {
        $this->yandexNavigatorLink = $yandexNavigatorLink;

        return $this;
    }

    public function getGoogleMapLink(): ?string
    {
        return $this->googleMapLink;
    }

    public function setGoogleMapLink(?string $googleMapLink): self
    {
        $this->googleMapLink = $googleMapLink;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
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

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(?string $videoLink): self
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getImgFolder()
    {
        return self::IMAGES_PATH.'/gallery/'. $this->getId() . '/';
    }

    /**
     * Example:
     * return $this->getSlug();
     * @return string
     */
    public function getAvatarName(): string
    {
        return md5($this->getName());
    }

    public function getAvatarFolder()
    {
        return self::IMAGES_PATH.'/avatar/';
    }

    public function getAvatarUrl(): string
    {
        $base_file_name = $this->getAvatarFolder().$this->getAvatarName();
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $base_file_name . '.jpg')) {
            return $base_file_name . '.jpg';
        }
        return $base_file_name . '.png';
    }

    public function setAvatarFile(File $avatar = null)
    {
        $this->avatarFile = $avatar;
        if ($avatar) {
            $this->modifyDate = new \DateTime('now');
        }
    }

    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    public function getAvatar(): string
    {
        return pathinfo($this->getAvatarUrl(),PATHINFO_BASENAME);
    }

    public function setAvatar(?string $avatar): self
    {
        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

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
        }

        return $this;
    }

    public function removeDistrict(District $district): self
    {
        if ($this->districts->contains($district)) {
            $this->districts->removeElement($district);
        }

        return $this;
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
        }

        return $this;
    }

    public function removeSubwayStation(SubwayStation $subwayStation): self
    {
        if ($this->subwayStations->contains($subwayStation)) {
            $this->subwayStations->removeElement($subwayStation);
        }

        return $this;
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
            $workingDay->setSalon($this);
        }

        return $this;
    }

    public function removeWorkingDay(WorkingDay $workingDay): self
    {
        if ($this->workingDays->contains($workingDay)) {
            $this->workingDays->removeElement($workingDay);
            // set the owning side to null (unless already changed)
            if ($workingDay->getSalon() === $this) {
                $workingDay->setSalon(null);
            }
        }

        return $this;
    }
}
