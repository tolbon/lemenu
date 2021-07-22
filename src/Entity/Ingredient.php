<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
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
     * @ORM\ManyToMany(targetEntity=IngredientTag::class, mappedBy="attach")
     */
    private $ingredientTags;

    /**
     * @ORM\ManyToMany(targetEntity=MenuItem::class, mappedBy="ingredients")
     */
    private $menuItems;

    public function __construct()
    {
        $this->ingredientTags = new ArrayCollection();
        $this->menuItems = new ArrayCollection();
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

    /**
     * @return Collection|IngredientTag[]
     */
    public function getIngredientTags(): Collection
    {
        return $this->ingredientTags;
    }

    public function addIngredientTag(IngredientTag $ingredientTag): self
    {
        if (!$this->ingredientTags->contains($ingredientTag)) {
            $this->ingredientTags[] = $ingredientTag;
            $ingredientTag->addAttach($this);
        }

        return $this;
    }

    public function removeIngredientTag(IngredientTag $ingredientTag): self
    {
        if ($this->ingredientTags->removeElement($ingredientTag)) {
            $ingredientTag->removeAttach($this);
        }

        return $this;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $menuItem): self
    {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems[] = $menuItem;
            $menuItem->addIngredient($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItems->removeElement($menuItem)) {
            $menuItem->removeIngredient($this);
        }

        return $this;
    }
}
