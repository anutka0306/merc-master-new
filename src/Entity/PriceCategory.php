<?php

namespace App\Entity;

use App\Repository\PriceModelRepository;
use App\Repository\RootServiceRepository;
use App\Repository\ContentRepository;
use App\Repository\BrandRepository;
use App\Repository\PriceBrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PriceCategory
 *
 * @ORM\Table(name="price__categories")
 * @ORM\Entity(repositoryClass="App\Repository\PriceCategoryRepository")
 * @ORM\EntityListeners({"App\Doctrine\GeneratePagesByPriceCategoryListener"})
 */
class PriceCategory
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
     * @ORM\ManyToOne(targetEntity="PriceCategory", inversedBy="children")
     */
    private $parent;
    
    /**
     * @ORM\OneToMany(targetEntity="PriceCategory", mappedBy="parent")
     */
    private $children;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Service", mappedBy="price_category")
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity="PriceService", mappedBy="priceCategory")
     */
    private $priceServices;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $metaDescriptionTemplate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Naschiraboty::class, mappedBy="price_categoty")
     */
    private $naschiraboti;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->priceServices = new ArrayCollection();
        $this->naschiraboti = new ArrayCollection();
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
    
    
    public function getParent(): ?self
    {
        return $this->parent;
    }
    
    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        
        return $this;
    }
    
    /**
     * @return Collection|self[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }
    
    
    public function getAllChildrenIds(): array
    {
        if ($this->children->isEmpty()) {
            return [];
        }
        $children_ids = [];
        foreach ($this->children as $child) {
            $children_ids[] = $child->getId();
            if ($child->getChildren()->count()) {
                foreach ($child->getChildren() as $sub_child) {
                    $children_ids[] = $sub_child->getId();
                }
            }
        }
        return $children_ids;
    }
    
    public function fillChildrenServices():void
    {
        if ($this->children->isEmpty()) {
            return;
        }
        foreach ($this->getChildren() as $child) {
            if ($child->getPriceServices()->count()) {
                foreach ($child->getPriceServices() as $sub_service) {
                    $this->addPriceService($sub_service);
                }
            }
        }
    }
    
    public function addChild(self $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }
        
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
            $content->setPriceCategory($this);
        }
        
        return $this;
    }
    
    public function removeContent(Service $content): self
    {
        if ($this->contents->contains($content)) {
            $this->contents->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getPriceCategory() === $this) {
                $content->setPriceCategory(null);
            }
        }
        
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
            $priceService->setPriceCategory($this);
        }

        return $this;
    }

    public function removePriceService(PriceService $priceService): self
    {
        if ($this->priceServices->contains($priceService)) {
            $this->priceServices->removeElement($priceService);
            // set the owning side to null (unless already changed)
            if ($priceService->getPriceCategory() === $this) {
                $priceService->setPriceCategory(null);
            }
        }

        return $this;
    }
    
    public function setServiceAtFirstPosition(?PriceService $price_service)
    {
        if ( ! $price_service) {
            return;
        }
        if ($this->priceServices->contains($price_service)) {
            $this->priceServices->removeElement($price_service);
            $services_copy = $this->priceServices->toArray();
            $this->priceServices->clear();
            $this->priceServices->add($price_service);
            foreach ($services_copy as $item) {
                $this->priceServices->add($item);
            }
        }
    }
    
    public function setPriceForServices(Content $content, PriceModelRepository $priceModelRepository)
    {
        if ( ! $this->getPriceServices()->count()) {
            return;
        }
        foreach ($this->getPriceServices() as $price_service) {
            $price_service->setPriceByContent($content, $priceModelRepository);
        }
    }
    
    public function setPathForServices(Content $content,RootServiceRepository $rootServiceRepository, ContentRepository $cr = null, PriceBrandRepository $pbr = null, PriceModelRepository $mr = null)
    {
        if ( ! $this->getPriceServices()->count()) {
            return;
        }
        foreach ($this->getPriceServices() as $price_service) {
            $price_service->setPathByContent($content, $rootServiceRepository, $cr, $pbr, $mr);
        }
    }
    
    public function __toString()
    {
        $name = (string)$this->name;
        if ($this->getParent()) {
            $name = ' - '.$name;
        }
        return $name;
    }

    public function getMetaDescriptionTemplate(): ?string
    {
        if ($this->metaDescriptionTemplate) {
            return $this->metaDescriptionTemplate;
        }
        if ($this->getParent()){
            return $this->getParent()->getMetaDescriptionTemplate();
        }
        return null;
    }

    public function setMetaDescriptionTemplate(?string $metaDescriptionTemplate): self
    {
        $this->metaDescriptionTemplate = $metaDescriptionTemplate;

        return $this;
    }

    public function setPathForRootServices(RootServiceRepository $rootServiceRepository)
    {
        if ( ! $this->getPriceServices()->count()) {
            return;
        }
        foreach ($this->getPriceServices() as $price_service) {
            $price_service->setPathForRootService($rootServiceRepository);
        }
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

    public function getFullName(): ?string
    {
        $parent = $this->getParent();
        $parentName = $parent ? $parent->getName() . ' - ' : '';
        return $parentName.$this->getName();
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function removeChild(PriceCategory $child): self
    {
        if ($this->children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Naschiraboty[]
     */
    public function getNaschiraboti(): Collection
    {
        return $this->naschiraboti;
    }

    public function addNaschiraboti(Naschiraboty $naschiraboti): self
    {
        if (!$this->naschiraboti->contains($naschiraboti)) {
            $this->naschiraboti[] = $naschiraboti;
            $naschiraboti->addPriceCategoty($this);
        }

        return $this;
    }

    public function removeNaschiraboti(Naschiraboty $naschiraboti): self
    {
        if ($this->naschiraboti->removeElement($naschiraboti)) {
            $naschiraboti->removePriceCategoty($this);
        }

        return $this;
    }
}
