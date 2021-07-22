<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="hasMenu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activate = true;

    /**
     * @ORM\ManyToMany(targetEntity=MenuSection::class, inversedBy="menus")
     */
    private $hasMenuSection;

    public function __construct()
    {
        $this->hasMenuSection = new ArrayCollection();
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

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function isActivate(): ?bool
    {
        return $this->activate;
    }

    public function setActivate(bool $activate): self
    {
        $this->activate = $activate;

        return $this;
    }

    /**
     * @return Collection|MenuSection[]
     */
    public function getHasMenuSection(): Collection
    {
        return $this->hasMenuSection;
    }

    public function addHasMenuSection(MenuSection $hasMenuSection): self
    {
        if (!$this->hasMenuSection->contains($hasMenuSection)) {
            $this->hasMenuSection[] = $hasMenuSection;
        }

        return $this;
    }

    public function removeHasMenuSection(MenuSection $hasMenuSection): self
    {
        $this->hasMenuSection->removeElement($hasMenuSection);

        return $this;
    }
}
