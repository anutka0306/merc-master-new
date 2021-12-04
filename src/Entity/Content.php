<?php

namespace App\Entity;

use App\Entity\Contracts\PageInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Content
 *
 * @ORM\Table(name="content",uniqueConstraints={@UniqueConstraint(name="path", columns={"path"})})
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="page_type", type="string")
 * @ORM\HasLifecycleCallbacks()
 */
class Content implements PageInterface
{
    use Traits\ModifyDateTrait;
    use Traits\SeoTrait;
    use Traits\RatingTrait;
    const MIN_RATING_VALUE = 4.6;
    const MAX_RATING_VALUE = 4.9;
    const MIN_RATING_COUNT = 7;
    const MAX_RATING_COUNT = 22;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
     /**
     * @var int
     * 
     * @ORM\Column(name="brand_id", type="integer", nullable=true)
     * 
     */
    protected $brand_id;

    /**
     * @var int
     * @ORM\Column(name="model_id", type="integer", nullable=true)
     */
    protected $model_id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="string", length=250, nullable=true)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=true)
     */
    protected $text='';


    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    protected $sort = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="images", type="text", length=65535, nullable=true)
     */
    protected $images='';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Content", inversedBy="pages")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Content", mappedBy="parent")
     */
    protected $pages;

    /**
     * @ORM\Column(type="boolean", options={"default": 1})
     */
    protected $published = true;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_down;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_down2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_down_img;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_down_img2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_down_bg;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_down3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_down_img3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_down4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_down_img4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $page_icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_img;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_icon1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_icon2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_icon3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_icon4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_text1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_text2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_text3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adv_text4;

    /**
     * @ORM\OneToMany(targetEntity=MenuTop::class, mappedBy="link", orphanRemoval=true)
     */
    private $top_menu;

    /**
     * @ORM\OneToMany(targetEntity=MenuLeft::class, mappedBy="link", orphanRemoval=true)
     */
    private $menu_left;



    public function __construct()
    {
        $this->pages = new ArrayCollection();
        $this->ratingValue = $this->getRandomRatingValue();
        $this->ratingCount = $this->getRandomRatingCount();
        $this->top_menu = new ArrayCollection();
        $this->menu_left = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path)
    {
        $this->path = $path;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text)
    {
        $this->text = $text;
        if (null === $this->text) {
            $this->text = '';
        }
        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort)
    {
        $this->sort = $sort;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images)
    {
        if ($images === null) {
            $images = '';
        }
        $this->images = $images;
        
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
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function addPage(self $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages[] = $page;
            $page->setParent($this);
        }

        return $this;
    }

    public function removePage(self $page): self
    {
        if ($this->pages->contains($page)) {
            $this->pages->removeElement($page);
            // set the owning side to null (unless already changed)
            if ($page->getParent() === $this) {
                $page->setParent(null);
            }
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
    
    public function getPriceBrand():?PriceBrand
    {
        return null;
    }
    
    public function getPriceModel():?PriceModel
    {
        return null;
    }
    
    public function getBrand():?Brand
    {
        return null;
    }
    
    public function getModel():?Model
    {
        return null;
    }

    public function getService(): ?PriceService
    {
        return null;
    }
    
    public function getAlias():string
    {
        $alias = trim($this->getPath());
        return $alias?:'/';
    }
    
    public function getBrandModelWithTranslation():string
    {
        return '';
    }


    /**
     * @ORM\PrePersist()
    */
    public function onPrePersistsetParent()
    {
        if (empty($this->parent)) {

        }
    }

    public function getBrandId(): ?int
    {
        return $this->brand_id;
    }

    public function getModelId(): ?int
    {
        return $this->model_id;
    }

    public function setBrandId(?int $brand_id): self
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    public function getTextDown(): ?string
    {
        return $this->text_down;
    }

    public function setTextDown(?string $text_down): self
    {
        $this->text_down = $text_down;

        return $this;
    }

    public function getTextDown2(): ?string
    {
        return $this->text_down2;
    }

    public function setTextDown2(?string $text_down2): self
    {
        $this->text_down2 = $text_down2;

        return $this;
    }

    public function getTextDownImg(): ?string
    {
        return $this->text_down_img;
    }

    public function setTextDownImg(?string $text_down_img): self
    {
        $this->text_down_img = $text_down_img;

        return $this;
    }

    public function getTextDownImg2(): ?string
    {
        return $this->text_down_img2;
    }

    public function setTextDownImg2(?string $text_down_img2): self
    {
        $this->text_down_img2 = $text_down_img2;

        return $this;
    }

    public function getTextDownBg(): ?string
    {
        return $this->text_down_bg;
    }

    public function setTextDownBg(?string $text_down_bg): self
    {
        $this->text_down_bg = $text_down_bg;

        return $this;
    }

    public function getTextDown3(): ?string
    {
        return $this->text_down3;
    }

    public function setTextDown3(?string $text_down3): self
    {
        $this->text_down3 = $text_down3;

        return $this;
    }

    public function getTextDownImg3(): ?string
    {
        return $this->text_down_img3;
    }

    public function setTextDownImg3(?string $text_down_img3): self
    {
        $this->text_down_img3 = $text_down_img3;

        return $this;
    }

    public function getTextDown4(): ?string
    {
        return $this->text_down4;
    }

    public function setTextDown4(?string $text_down4): self
    {
        $this->text_down4 = $text_down4;

        return $this;
    }

    public function getTextDownImg4(): ?string
    {
        return $this->text_down_img4;
    }

    public function setTextDownImg4(?string $text_down_img4): self
    {
        $this->text_down_img4 = $text_down_img4;

        return $this;
    }

    public function setModelId(?int $model_id): self
    {
        $this->model_id = $model_id;

        return $this;
    }

    public function getPageIcon(): ?string
    {
        return $this->page_icon;
    }

    public function setPageIcon(?string $page_icon): self
    {
        $this->page_icon = $page_icon;

        return $this;
    }

    public function getTextImg(): ?string
    {
        return $this->text_img;
    }

    public function setTextImg(?string $text_img): self
    {
        $this->text_img = $text_img;

        return $this;
    }

    public function getAdvIcon1(): ?string
    {
        return $this->adv_icon1;
    }

    public function setAdvIcon1(?string $adv_icon1): self
    {
        $this->adv_icon1 = $adv_icon1;

        return $this;
    }

    public function getAdvIcon2(): ?string
    {
        return $this->adv_icon2;
    }

    public function setAdvIcon2(?string $adv_icon2): self
    {
        $this->adv_icon2 = $adv_icon2;

        return $this;
    }

    public function getAdvIcon3(): ?string
    {
        return $this->adv_icon3;
    }

    public function setAdvIcon3(?string $adv_icon3): self
    {
        $this->adv_icon3 = $adv_icon3;

        return $this;
    }

    public function getAdvIcon4(): ?string
    {
        return $this->adv_icon4;
    }

    public function setAdvIcon4(?string $adv_icon4): self
    {
        $this->adv_icon4 = $adv_icon4;

        return $this;
    }

    public function getAdvText1(): ?string
    {
        return $this->adv_text1;
    }

    public function setAdvText1(?string $adv_text1): self
    {
        $this->adv_text1 = $adv_text1;

        return $this;
    }

    public function getAdvText2(): ?string
    {
        return $this->adv_text2;
    }

    public function setAdvText2(?string $adv_text2): self
    {
        $this->adv_text2 = $adv_text2;

        return $this;
    }

    public function getAdvText3(): ?string
    {
        return $this->adv_text3;
    }

    public function setAdvText3(?string $adv_text3): self
    {
        $this->adv_text3 = $adv_text3;

        return $this;
    }

    public function getAdvText4(): ?string
    {
        return $this->adv_text4;
    }

    public function setAdvText4(?string $adv_text4): self
    {
        $this->adv_text4 = $adv_text4;

        return $this;
    }

    /**
     * @return Collection|MenuTop[]
     */
    public function getTopMenu(): Collection
    {
        return $this->top_menu;
    }

    public function addTopMenu(MenuTop $topMenu): self
    {
        if (!$this->top_menu->contains($topMenu)) {
            $this->top_menu[] = $topMenu;
            $topMenu->setLink($this);
        }

        return $this;
    }

    public function removeTopMenu(MenuTop $topMenu): self
    {
        if ($this->top_menu->removeElement($topMenu)) {
            // set the owning side to null (unless already changed)
            if ($topMenu->getLink() === $this) {
                $topMenu->setLink(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MenuLeft[]
     */
    public function getMenuLeft(): Collection
    {
        return $this->menu_left;
    }

    public function addMenuLeft(MenuLeft $menuLeft): self
    {
        if (!$this->menu_left->contains($menuLeft)) {
            $this->menu_left[] = $menuLeft;
            $menuLeft->setLink($this);
        }

        return $this;
    }

    public function removeMenuLeft(MenuLeft $menuLeft): self
    {
        if ($this->menu_left->removeElement($menuLeft)) {
            // set the owning side to null (unless already changed)
            if ($menuLeft->getLink() === $this) {
                $menuLeft->setLink(null);
            }
        }

        return $this;
    }
}
