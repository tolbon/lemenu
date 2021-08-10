<?php

namespace App\Entity;

use App\Repository\MenuSectionRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuSectionRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * 
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
    private $name;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price3;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayCurrencySymbolOnTitle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayCurrencyOnChildren;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayChildrenSectionAfterMenuItems;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titlePrice1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titlePrice2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titlePrice3;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateAt;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * @ORM\OneToMany(targetEntity=MenuSectionMenuItem::class, mappedBy="menuSection", orphanRemoval=true)
     */
    private $menuSectionMenuItems;

    public function __construct()
    {
        $this->menuSectionMenuItems = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice1(): ?float
    {
        return $this->price1;
    }

    public function setPrice1(?float $price1): self
    {
        $this->price1 = $price1;

        return $this;
    }

    public function getPrice2(): ?float
    {
        return $this->price2;
    }

    public function setPrice2(?float $price2): self
    {
        $this->price2 = $price2;

        return $this;
    }

    public function getPrice3(): ?float
    {
        return $this->price3;
    }

    public function setPrice3(?float $price3): self
    {
        $this->price3 = $price3;

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

    public function getDisplayCurrencyOnChildren(): ?bool
    {
        return $this->displayCurrencyOnChildren;
    }

    public function setDisplayCurrencyOnChildren(bool $displayCurrencyOnChildren): self
    {
        $this->displayCurrencyOnChildren = $displayCurrencyOnChildren;

        return $this;
    }

    public function getDisplayChildrenSectionAfterMenuItems(): ?bool
    {
        return $this->displayChildrenSectionAfterMenuItems;
    }

    public function setDisplayChildrenSectionAfterMenuItems(bool $displayChildrenSectionAfterMenuItems): self
    {
        $this->displayChildrenSectionAfterMenuItems = $displayChildrenSectionAfterMenuItems;

        return $this;
    }

    public function getTitlePrice1(): ?string
    {
        return $this->titlePrice1;
    }

    public function setTitlePrice1(?string $titlePrice1): self
    {
        $this->titlePrice1 = $titlePrice1;

        return $this;
    }

    public function getTitlePrice2(): ?string
    {
        return $this->titlePrice2;
    }

    public function setTitlePrice2(?string $titlePrice2): self
    {
        $this->titlePrice2 = $titlePrice2;

        return $this;
    }

    public function getTitlePrice3(): ?string
    {
        return $this->titlePrice3;
    }

    public function setTitlePrice3(?string $titlePrice3): self
    {
        $this->titlePrice3 = $titlePrice3;

        return $this;
    }

    public function getInsertDateAt(): ?\DateTimeImmutable
    {
        return $this->insertDateAt;
    }

    public function setInsertDateAt(\DateTimeImmutable $insertDateAt): self
    {
        $this->insertDateAt = $insertDateAt;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * @return Collection|MenuSectionMenuItem[]
     */
    public function getMenuSectionMenuItems(): Collection
    {
        return $this->menuSectionMenuItems;
    }

    public function addMenuSectionMenuItem(MenuSectionMenuItem $menuSectionMenuItem): self
    {
        if (!$this->menuSectionMenuItems->contains($menuSectionMenuItem)) {
            $this->menuSectionMenuItems[] = $menuSectionMenuItem;
            $menuSectionMenuItem->setMenuSection($this);
        }

        return $this;
    }

    public function removeMenuSectionMenuItem(MenuSectionMenuItem $menuSectionMenuItem): self
    {
        if ($this->menuSectionMenuItems->removeElement($menuSectionMenuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuSectionMenuItem->getMenuSection() === $this) {
                $menuSectionMenuItem->setMenuSection(null);
            }
        }

        return $this;
    }


    /**
     * @ORM\PrePersist
     */
    public function setInsertDateAtDefault(): void 
    {
        $this->insertDateAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }
}
