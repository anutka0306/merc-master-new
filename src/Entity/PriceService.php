<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\ModelRepository;
use App\Repository\PriceModelRepository;
use App\Repository\ContentRepository;
use App\Repository\RootServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * PriceService
 *
 * @ORM\Table(name="price__services")
 * @ORM\Entity(repositoryClass="App\Repository\PriceServiceRepository")
 * @ORM\EntityListeners({"App\Doctrine\GeneratePagesByPriceServiceListener"})
 *
 */
class PriceService
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="hours", type="float", precision=4, scale=1, nullable=false, options={"default"="1.0"})
     */
    private $hours = '1.0';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Service", mappedBy="service")
     */
    private $contents;

    /**
     * @ORM\ManyToOne(targetEntity="PriceCategory", inversedBy="priceServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $priceCategory;
    

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BeforeAfter", mappedBy="priceServices")
     */
    private $beforeAfterImages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = 1;
    
    private $priceOfHour = PriceBrand::DEFAULT_PRICE_OF_HOUR;
    private $increase = PriceBrand::DEFAULT_INCREASE;
    private $path;
    private $nameInPriceList;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pagetitle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Salon", mappedBy="excludedServices")
     */
    private $excludedSalons;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_popular;

    /**
     * @ORM\OneToMany(targetEntity=Naschiraboty::class, mappedBy="service")
     */
    private $nashiraboty;

    
    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->beforeAfterImages = new ArrayCollection();
        $this->excludedSalons = new ArrayCollection();
        $this->nashiraboty = new ArrayCollection();

    }
    
    public function getPriceOfHour(): int
    {
        return $this->priceOfHour;
    }
    
    public function getIncrease(): int
    {
        return $this->increase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHours(): ?float
    {
        return $this->hours;
    }

    public function setHours(float $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Service $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setService($this);
        }

        return $this;
    }

    public function removeContent(Service $content): self
    {
        if ($this->contents->contains($content)) {
            $this->contents->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getService() === $this) {
                $content->setService(null);
            }
        }

        return $this;
    }

    public function getPriceCategory(): ?PriceCategory
    {
        return $this->priceCategory;
    }

    public function getBrandById(int $id, PriceBrandRepository $priceBrandRepository){

     return $priceBrandRepository->findOneBy(['id'=>$id]);
    }

    public function setPriceCategory(?PriceCategory $priceCategory): self
    {
        $this->priceCategory = $priceCategory;

        return $this;
    }
    
    public function setPriceByContent(Content $content, PriceModelRepository $priceModelRepository)
    {
        $price_brand = $content->getPriceBrand();
        $price_model = $content->getPriceModel();
        $model_id = $content->getModelId();
        $this->model_id = $model_id;

        if($price_brand || $price_model){
            if($price_brand){
                $this->increase = $price_brand->getIncrease();
                $priceOfHour = $price_brand->getClass()->getPriceOfHour();
            }
            if ($price_model) {
                $this->increase = $price_model ? $price_model->getIncrease() : PriceBrand::DEFAULT_INCREASE;
                $priceOfHour =  $price_model->getClass()->getPriceOfHour();
            }
        }
        if ($model_id){
            $model = $priceModelRepository->find($model_id);
            $this->increase = $model->getIncrease();
            $priceOfHour = $model->getClass()->getPriceOfHour();
        }

        else{
            $this->increase = $price_brand ? $price_brand->getIncrease() : PriceBrand::DEFAULT_INCREASE;
            $priceOfHour = $price_brand ? $price_brand->getClass()->getPriceOfHour() : PriceBrand::DEFAULT_PRICE_OF_HOUR;
        }
        $this->priceOfHour = $priceOfHour;
        $this->price = round($this->getHours() * $this->priceOfHour * (1 + $this->increase));

    }
    
    public function setPathByContent(Content $content,RootServiceRepository $rootServiceRepository, ContentRepository $contentRepository, PriceBrandRepository $priceBrandRepository, PriceModelRepository $priceModelRepository):self
    {


        $model = $content->getModel();
        if ($model) {
            foreach ($model->getPages() as $page) {
                if ($page instanceof Service && $page->getService() && $page->getService()->getId() === $this->getId() && $page->getPublished()) {
                    $this->path = $page->getPath();
                    $this->nameInPriceList = $this->name.' '.$model->getBrandAndModelName();
                    return $this;
                }
            }//endfor

            $brandId = $content->getParent()->getBrandId();
            //Здесь поменяла, иначен не работало с моделями
            if(!$brandId){
                $brandId = $content->getParent()->getParent()->getBrandId();
            }
            //$path = $this->slug.$this->getBrandById($brandId, $priceBrandRepository)->getCode().'/'.$model->getModelCode().'/';
            $path = '/'.$this->slug.'/';
            if($contentRepository->findOneBy(['path' => $path])) {
                $this->path = $path;
                return $this;
            }

        }

        $modelId = $content->getModelId();
        if($modelId){
            $modelCode = str_replace('cc', 'passat-cc',$priceModelRepository->find($modelId)->getCode());
            //для volkswagen
            if($content->getBrand() == null && strpos($content->getPath(), '/volkswagen/')){
                $brandCode = 'volkswagen';
            }else {
                $brandCode = $content->getBrand()->getPriceBrand()->getCode();
            }
            if($modelCode && $brandCode){

                /*$path = $this->slug.str_replace('-euro','',$brandCode).'/'.$modelCode.'/';*/
                $path = '/'.$this->slug.'/';
                if($contentRepository->findOneBy(['path' => $path])){

                    $this->path = $path;
                }
                return $this;
            }

        }


        $brand = $content->getBrand();

        if ($brand) {
            //$this->path = 'path';
            foreach ($brand->getPages() as $page) {
                if ($page instanceof Service && $page->getService() && $page->getService()->getId() === $this->getId()) {
                    if ($page->getPublished()) {
                        $this->path = $page->getPath();
                        $this->nameInPriceList = $this->name.' '.$brand->getBrandAndModelName();
                    }else{
                        $rootServicePage = $rootServiceRepository->findOneBy(['service'=>$this]);
                        if (null !== $rootServicePage) {
                            $this->path = $rootServicePage->getPath();
                            $this->nameInPriceList = $this->name;
                        }
                    }

                    return $this;

                }else{


                    //если коды не совпали, то будем проверять в табл. content
                    $path = '/'.$brand->getPriceBrand()->getCode().'/'.$this->getPriceCategory()->getSlug().'/'.$this->getSlug().'/';

                    if($contentRepository->findOneBy(['path' => $path, 'published' => 1])){
                        $this->path = $path;
                    }


                    return $this;
                }//end else

            }//endforeach

//это отрабатывает для Пежо, Ford страницы бренда
            $brandId = $content->getBrandId();
            $path = $this->slug.str_replace('-euro', '',$this->getBrandById($brandId, $priceBrandRepository)->getCode()).'/';
            if($contentRepository->findOneBy(['path' => $path])){
                $this->path = $path;
            }

        }//end brand

        return $this;
    }

    public function setPathForRootService(RootServiceRepository $rootServiceRepository): void
    {
        $rootServicePage = $rootServiceRepository->findOneBy(['service'=>$this]);
        if (null === $rootServicePage) {
            return;
        }
        $this->path = $rootServicePage->getPath();
    }
    
    public function getPrice()
    {
        return round($this->getPriceOfHour() * $this->getHours(), -1) + $this->getIncrease();
    }
    
    
    public function getPath()
    {
        return $this->path;
    }
    
    
    public function __toString()
    {
        return (string)$this->name;
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
            $beforeAfterImage->addPriceService($this);
        }

        return $this;
    }

    public function removeBeforeAfterImage(BeforeAfter $beforeAfterImage): self
    {
        if ($this->beforeAfterImages->contains($beforeAfterImage)) {
            $this->beforeAfterImages->removeElement($beforeAfterImage);
            $beforeAfterImage->removePriceService($this);
        }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
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
            $excludedSalon->addExcludedService($this);
        }

        return $this;
    }

    public function removeExcludedSalon(Salon $excludedSalon): self
    {
        if ($this->excludedSalons->contains($excludedSalon)) {
            $this->excludedSalons->removeElement($excludedSalon);
            $excludedSalon->removeExcludedService($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameInPriceList()
    {
        return $this->nameInPriceList;
    }

    public function getPagetitle(): ?string
    {
        return $this->pagetitle;
    }

    public function setPagetitle(?string $pagetitle): self
    {
        $this->pagetitle = $pagetitle;

        return $this;
    }

    public function getIsPopular(): ?bool
    {
        return $this->is_popular;
    }

    public function setIsPopular(bool $is_popular): self
    {
        $this->is_popular = $is_popular;

        return $this;
    }

    /**
     * @return Collection|Naschiraboty[]
     */
    public function getNashiraboty(): Collection
    {
        return $this->nashiraboty;
    }

    public function addNashiraboty(Naschiraboty $nashiraboty): self
    {
        if (!$this->nashiraboty->contains($nashiraboty)) {
            $this->nashiraboty[] = $nashiraboty;
            $nashiraboty->setService($this);
        }

        return $this;
    }

    public function removeNashiraboty(Naschiraboty $nashiraboty): self
    {
        if ($this->nashiraboty->removeElement($nashiraboty)) {
            // set the owning side to null (unless already changed)
            if ($nashiraboty->getService() === $this) {
                $nashiraboty->setService(null);
            }
        }

        return $this;
    }

}
