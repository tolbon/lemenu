<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Menu;
use App\Entity\MenuItem;
use App\Repository\MenuSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MenuSection
 *
 * @ORM\Table(name="menu_section")
 * @ORM\Entity(repositoryClass=MenuSectionRepository::class)
 */
class MenuSection
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private string $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private string $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_price1", type="string", length=20, nullable=true)
     */
    private ?string $titlePrice1;
    /**
     * @var string|null
     *
     * @ORM\Column(name="title_price2", type="string", length=20, nullable=true)
     */
    private ?string $titlePrice2;
    /**
     * @var string|null
     *
     * @ORM\Column(name="title_price3", type="string", length=20, nullable=true)
     */
    private ?string $titlePrice3;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price1", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price1;
    /**
     * @var float|null
     *
     * @ORM\Column(name="price2", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price2;
    /**
     * @var float|null
     *
     * @ORM\Column(name="price3", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price3;

    /**
     * @var bool
     *
     * @ORM\Column(name="display_currency_symbol_on_title", type="boolean", nullable=false)
     */
    private bool $displayCurrencySymbolOnTitle;

    /**
     * @var bool
     *
     * @ORM\Column(name="display_currency_symbol_on_children", type="boolean", nullable=false)
     */
    private bool $displayCurrencySymbolOnChildren;

    /**
     * @var bool
     *
     * @ORM\Column(name="display_description_after_children", type="boolean", nullable=false)
     */
    private bool $displayDescriptionAfterChildren;

    /**
     * @var bool
     *
     * @ORM\Column(name="display_children_section_after_menuItems", type="boolean", nullable=false)
     */
    private bool $displayChildrenSectionAfterMenuItems;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="insert_date_db", type="datetimetz_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateDb = 'CURRENT_TIMESTAMP';

    /**
     * @ORM\ManyToMany(targetEntity=MenuItem::class)
     */
    private $hasMenuItem;

    /**
     * @ORM\OneToMany(targetEntity=MenuHasMenuSection::class, mappedBy="menuSection", orphanRemoval=true)
     */
    private $menuHasMenuSections;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class)
     */
    private Restaurant $restaurant;


    public function __construct()
    {
        $this->hasMenuSection = new ArrayCollection();
        $this->hasMenuItem = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->menuHasMenuSections = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice1(): ?float
    {
        return $this->price1;
    }

    public function getPrice2(): ?float
    {
        return $this->price2;
    }

    public function getPrice3(): ?float
    {
        return $this->price3;
    }

    public function setPrice1(?float $price): self
    {
        $this->price1 = $price;

        return $this;
    }

    public function setPrice2(?float $price): self
    {
        $this->price2 = $price;

        return $this;
    }

    public function setPrice3(?float $price): self
    {
        $this->price3 = $price;

        return $this;
    }

    public function getMenuSection(): ?self
    {
        return $this->menuSection;
    }

    public function setMenuSection(?self $menuSection): self
    {
        $this->menuSection = $menuSection;

        return $this;
    }

    /**
     * @return Collection<MenuItem>|MenuItem[]
     */
    public function getHasMenuItem(): Collection
    {
        return $this->hasMenuItem;
    }

    public function addHasMenuItem(MenuItem $hasMenuItem): self
    {
        if (!$this->hasMenuItem->contains($hasMenuItem)) {
            $this->hasMenuItem[] = $hasMenuItem;
        }

        return $this;
    }

    public function removeHasMenuItem(MenuItem $hasMenuItem): self
    {
        $this->hasMenuItem->removeElement($hasMenuItem);

        return $this;
    }

    public function replaceHasMenuItem($hasMenuItems): self
    {
        $this->hasMenuItem = $hasMenuItems;

        return $this;
    }

    /**
     * @return Collection<Menu>|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->addHasMenuSection($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeHasMenuSection($this);
        }

        return $this;
    }

    public function getDisplayCurrencySymbolOnTitle(): ?bool
    {
        return $this->displayCurrencySymbolOnTitle;
    }

    public function setDisplayCurrencySymbolOnTitle(bool $displayCurrencySymbolOnTitle): self
    {
        $this->displayCurrencySymbolOnTitle = $displayCurrencySymbolOnTitle;

        return $this;
    }

    public function getDisplayCurrencySymbolOnChildren(): ?bool
    {
        return $this->displayCurrencySymbolOnChildren;
    }

    public function setDisplayCurrencySymbolOnChildren(bool $displayCurrencySymbolOnChildren): self
    {
        $this->displayCurrencySymbolOnChildren = $displayCurrencySymbolOnChildren;

        return $this;
    }

    public function getDisplayDescriptionAfterChildren(): ?bool
    {
        return $this->displayDescriptionAfterChildren;
    }

    public function setDisplayDescriptionAfterChildren(bool $displayDescriptionAfterChildren): self
    {
        $this->displayDescriptionAfterChildren = $displayDescriptionAfterChildren;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisplayChildrenSectionAfterMenuItems(): bool
    {
        return $this->displayChildrenSectionAfterMenuItems;
    }

    /**
     * @param bool $displayChildrenSectionAfterMenuItems
     * @return MenuSection
     */
    public function setDisplayChildrenSectionAfterMenuItems(bool $displayChildrenSectionAfterMenuItems): self
    {
        $this->displayChildrenSectionAfterMenuItems = $displayChildrenSectionAfterMenuItems;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getInsertDateDb()
    {
        return $this->insertDateDb;
    }

    /**
     * @param \DateTimeImmutable $insertDateDb
     * @return MenuSection
     */
    public function setInsertDateDb($insertDateDb): self
    {
        $this->insertDateDb = $insertDateDb;
        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<MenuHasMenuSection>|MenuHasMenuSection[]
     */
    public function getMenuHasMenuSections(): Collection
    {
        return $this->menuHasMenuSections;
    }

    public function addMenuHasMenuSection(MenuHasMenuSection $menuHasMenuSection): self
    {
        if (!$this->menuHasMenuSections->contains($menuHasMenuSection)) {
            $this->menuHasMenuSections[] = $menuHasMenuSection;
            $menuHasMenuSection->setMenuSection($this);
        }

        return $this;
    }

    public function removeMenuHasMenuSection(MenuHasMenuSection $menuHasMenuSection): self
    {
        if ($this->menuHasMenuSections->removeElement($menuHasMenuSection)) {
            // set the owning side to null (unless already changed)
            if ($menuHasMenuSection->getMenuSection() === $this) {
                $menuHasMenuSection->setMenuSection(null);
            }
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitlePrice1(): ?string
    {
        return $this->titlePrice1;
    }

    /**
     * @param string|null $titlePrice1
     * @return MenuSection
     */
    public function setTitlePrice1(?string $titlePrice1): MenuSection
    {
        $this->titlePrice1 = $titlePrice1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitlePrice2(): ?string
    {
        return $this->titlePrice2;
    }

    /**
     * @param string|null $titlePrice2
     * @return MenuSection
     */
    public function setTitlePrice2(?string $titlePrice2): MenuSection
    {
        $this->titlePrice2 = $titlePrice2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitlePrice3(): ?string
    {
        return $this->titlePrice3;
    }

    /**
     * @param string|null $titlePrice3
     * @return MenuSection
     */
    public function setTitlePrice3(?string $titlePrice3): MenuSection
    {
        $this->titlePrice3 = $titlePrice3;
        return $this;
    }

    /**
     * @return Restaurant
     */
    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    /**
     * @param Restaurant $restaurant
     * @return MenuSection
     */
    public function setRestaurant(Restaurant $restaurant): MenuSection
    {
        $this->restaurant = $restaurant;
        return $this;
    }
}
