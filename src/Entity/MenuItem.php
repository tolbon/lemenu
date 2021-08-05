<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 *
 * @ORM\Table(name="menu_item", uniqueConstraints={@ORM\UniqueConstraint(name="UIDX_restaurantId_name", columns={"restaurant_id", "name"})})
 * @ORM\Entity(repositoryClass=MenuItemRepository::class)
 */
class MenuItem
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
     * @ORM\Column(name="price1", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price1 = null;
    /**
     * @var float|null
     *
     * @ORM\Column(name="price2", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price2 = null;
    /**
     * @var float|null
     *
     * @ORM\Column(name="price3", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price3 = null;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="insert_date_db", type="datetimetz_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateDb;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="menuItems")
     */
    private $ingredients;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="menuItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * @ORM\ManyToMany(targetEntity=LabelMenuItem::class)
     */
    private $labels;

    /**
     * @ORM\ManyToMany(targetEntity=Allergy::class)
     */
    private $allergens;

    /**
     * @ORM\ManyToMany(targetEntity=Diet::class)
     */
    private $diets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->labels = new ArrayCollection();
        $this->allergens = new ArrayCollection();
        $this->diets = new ArrayCollection();
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

    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * @return Collection|LabelMenuItem[]
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(LabelMenuItem $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels[] = $label;
        }

        return $this;
    }

    public function removeLabel(LabelMenuItem $label): self
    {
        $this->labels->removeElement($label);

        return $this;
    }

    /**
     * @return Collection|Allergy[]
     */
    public function getAllergens(): Collection
    {
        return $this->allergens;
    }

    public function addAllergen(Allergy $allergen): self
    {
        if (!$this->allergens->contains($allergen)) {
            $this->allergens[] = $allergen;
        }

        return $this;
    }

    public function removeAllergen(Allergy $allergen): self
    {
        $this->allergens->removeElement($allergen);

        return $this;
    }

    /**
     * @return Collection|Diet[]
     */
    public function getDiets(): Collection
    {
        return $this->diets;
    }

    public function addDiet(Diet $diet): self
    {
        if (!$this->diets->contains($diet)) {
            $this->diets[] = $diet;
        }

        return $this;
    }

    public function removeDiet(Diet $diet): self
    {
        $this->diets->removeElement($diet);

        return $this;
    }
}
