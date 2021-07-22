<?php

namespace App\Entity;

use App\Repository\IngredientTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientTagRepository::class)
 */
class IngredientTag
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
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="ingredientTags")
     */
    private $attach;

    public function __construct()
    {
        $this->attach = new ArrayCollection();
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

    /**
     * @return Collection|Ingredient[]
     */
    public function getAttach(): Collection
    {
        return $this->attach;
    }

    public function addAttach(Ingredient $attach): self
    {
        if (!$this->attach->contains($attach)) {
            $this->attach[] = $attach;
        }

        return $this;
    }

    public function removeAttach(Ingredient $attach): self
    {
        $this->attach->removeElement($attach);

        return $this;
    }
}
