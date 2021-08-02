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
 * @ORM\Table(name="menu_section", indexes={@ORM\Index(name="IDX_A5A86751F98E57A8", columns={"menu_section_id"})})
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
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price;

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
     * @ORM\ManyToOne(targetEntity=MenuSection::class, inversedBy="hasMenuSection")
     */
    private ?MenuSection $menuSection;

    /**
     * @ORM\OneToMany(targetEntity=MenuSection::class, mappedBy="menuSection")
     */
    private $hasMenuSection;

    /**
     * @ORM\ManyToMany(targetEntity=MenuItem::class)
     */
    private $hasMenuItem;

    /**
     * @ORM\ManyToMany(targetEntity=Menu::class, mappedBy="hasMenuSection")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=MenuHasMenuSection::class, mappedBy="menuSection", orphanRemoval=true)
     */
    private $menuHasMenuSections;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
     * @return Collection<MenuSection>|MenuSection[]
     */
    public function getHasMenuSection(): Collection
    {
        return $this->hasMenuSection;
    }

    public function addHasMenuSection(self $hasMenuSection): self
    {
        if (!$this->hasMenuSection->contains($hasMenuSection)) {
            $this->hasMenuSection[] = $hasMenuSection;
            $hasMenuSection->setMenuSection($this);
        }

        return $this;
    }

    public function removeHasMenuSection(self $hasMenuSection): self
    {
        if ($this->hasMenuSection->removeElement($hasMenuSection)) {
            // set the owning side to null (unless already changed)
            if ($hasMenuSection->getMenuSection() === $this) {
                $hasMenuSection->setMenuSection(null);
            }
        }

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
}
