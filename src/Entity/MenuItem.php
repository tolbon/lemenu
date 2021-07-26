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
     * @ORM\Column(name="price", type="float", precision=8, scale=2, nullable=true)
     */
    private ?float $price = null;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="insert_date_db", type="datetimetz_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateDb;

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
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="menuItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->menuItemTags = new ArrayCollection();
        $this->menuSections = new ArrayCollection();
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

    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
