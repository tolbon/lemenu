<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
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
     * @ORM\Column(type="string", length=10)
     */
    private string $currency;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="restaurant", orphanRemoval=true)
     */
    private $hasMenu;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $activate;

    public function __construct()
    {
        $this->hasMenu = new ArrayCollection();
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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getHasMenu(): Collection
    {
        return $this->hasMenu;
    }

    public function addHasMenu(Menu $hasMenu): self
    {
        if (!$this->hasMenu->contains($hasMenu)) {
            $this->hasMenu[] = $hasMenu;
            $hasMenu->setRestaurant($this);
        }

        return $this;
    }

    public function removeHasMenu(Menu $hasMenu): self
    {
        if ($this->hasMenu->removeElement($hasMenu)) {
            // set the owning side to null (unless already changed)
            if ($hasMenu->getRestaurant() === $this) {
                $hasMenu->setRestaurant(null);
            }
        }

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
}
