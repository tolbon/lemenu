<?php

namespace App\Entity;

use App\Repository\MenuItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuItemRepository::class)
 */
class MenuItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="float", nullable=true, options={"unsigned"=true})
     */
    private ?float $price = null;

    /**
     * @ORM\ManyToMany(targetEntity=MenuSection::class, mappedBy="hasMenuItem")
     */
    private $menuSections;

    /**
     * @ORM\ManyToMany(targetEntity=MenuItemTag::class, mappedBy="attach")
     */
    private $menuItemTags;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="menuItems")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayCurrencySymbol;

    public function __construct()
    {
        $this->menuSections = new ArrayCollection();
        $this->menuItemTags = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
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

    /**
     * @return Collection|MenuSection[]
     */
    public function getMenuSections(): Collection
    {
        return $this->menuSections;
    }

    public function addMenuSection(MenuSection $menuSection): self
    {
        if (!$this->menuSections->contains($menuSection)) {
            $this->menuSections[] = $menuSection;
            $menuSection->addHasMenuItem($this);
        }

        return $this;
    }

    public function removeMenuSection(MenuSection $menuSection): self
    {
        if ($this->menuSections->removeElement($menuSection)) {
            $menuSection->removeHasMenuItem($this);
        }

        return $this;
    }

    /**
     * @return Collection|MenuItemTag[]
     */
    public function getMenuItemTags(): Collection
    {
        return $this->menuItemTags;
    }

    public function addMenuItemTag(MenuItemTag $menuItemTag): self
    {
        if (!$this->menuItemTags->contains($menuItemTag)) {
            $this->menuItemTags[] = $menuItemTag;
            $menuItemTag->addAttach($this);
        }

        return $this;
    }

    public function removeMenuItemTag(MenuItemTag $menuItemTag): self
    {
        if ($this->menuItemTags->removeElement($menuItemTag)) {
            $menuItemTag->removeAttach($this);
        }

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }

    public function getDisplayCurrencySymbol(): ?bool
    {
        return $this->displayCurrencySymbol;
    }

    public function setDisplayCurrencySymbol(bool $displayCurrencySymbol): self
    {
        $this->displayCurrencySymbol = $displayCurrencySymbol;

        return $this;
    }
}
