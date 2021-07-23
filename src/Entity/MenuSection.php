<?php

namespace App\Entity;

use App\Repository\MenuSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MenuSectionRepository::class)
 */
class MenuSection
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
    private ?float $price = 0.0;

    /**
     * @ORM\ManyToOne(targetEntity=MenuSection::class, inversedBy="hasMenuSection")
     */
    private $menuSection;

    /**
     * @ORM\OneToMany(targetEntity=MenuSection::class, mappedBy="menuSection")
     */
    private $hasMenuSection;

    /**
     * @ORM\ManyToMany(targetEntity=MenuItem::class, inversedBy="menuSections")
     */
    private $hasMenuItem;

    /**
     * @ORM\ManyToMany(targetEntity=Menu::class, mappedBy="hasMenuSection")
     */
    private $menus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayCurrencySymbol;

    public function __construct()
    {
        $this->hasMenuSection = new ArrayCollection();
        $this->hasMenuItem = new ArrayCollection();
        $this->menus = new ArrayCollection();
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
     * @return Collection|self[]
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
     * @return Collection|MenuItem[]
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

    /**
     * @return Collection|Menu[]
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
