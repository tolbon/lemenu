<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant", uniqueConstraints={@ORM\UniqueConstraint(name="url_slug_UNIQUE", columns={"url_slug"})})
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
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
     * @ORM\Column(name="description", type="text", length=16777215, nullable=false)
     */
    private string $description;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=5, nullable=false, options={"default"="EUR"})
     * @Assert\Currency
     */
    private string $currency = 'EUR';

    /**
     * @var bool
     *
     * @ORM\Column(name="activate", type="boolean", nullable=false)
     */
    private bool $activate;

    /**
     * @var string
     *
     * @ORM\Column(name="url_slug", type="string", length=100, nullable=false)
     */
    private string $urlSlug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private ?string $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private ?string $phone;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="restaurant", orphanRemoval=true)
     */
    private $hasMenu;

    /**
     * @ORM\OneToMany(targetEntity=MenuItem::class, mappedBy="restaurant", orphanRemoval=true)
     */
    private $menuItems;

    /**
     * @ORM\ManyToMany(targetEntity=LabelRestaurant::class)
     */
    private $restaurantLabels;

    public function __construct()
    {
        $this->hasMenu = new ArrayCollection();
        $this->menuItems = new ArrayCollection();
        $this->restaurantLabels = new ArrayCollection();
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

    public function getUrlSlug(): ?string
    {
        return $this->urlSlug;
    }

    public function setUrlSlug(string $url_slug): self
    {
        $this->urlSlug = $url_slug;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
            $menuItem->setRestaurant($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getRestaurant() === $this) {
                $menuItem->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LabelRestaurant[]
     */
    public function getRestaurantLabels(): Collection
    {
        return $this->restaurantLabels;
    }

    public function addRestaurantLabel(LabelRestaurant $restaurantLabel): self
    {
        if (!$this->restaurantLabels->contains($restaurantLabel)) {
            $this->restaurantLabels[] = $restaurantLabel;
        }

        return $this;
    }

    public function removeRestaurantLabel(LabelRestaurant $restaurantLabel): self
    {
        $this->restaurantLabels->removeElement($restaurantLabel);

        return $this;
    }




}
