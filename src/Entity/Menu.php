<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu", uniqueConstraints={@ORM\UniqueConstraint(name="UIDX_restaurantId_name", columns={"restaurant_id", "name"})}, indexes={@ORM\Index(name="IDX_7D053A93B1E7706E", columns={"restaurant_id"})})
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
     * @var bool
     *
     * @ORM\Column(name="activate", type="boolean", nullable=false)
     */
    private bool $activate;

    /**
     * @var string
     *
     * @ORM\Column(name="url_slug", type="string", length=255, nullable=false)
     */
    private string $urlSlug;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="insert_date_db", type="datetimetz_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateDb = 'CURRENT_TIMESTAMP';

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="hasMenu")
     * @ORM\JoinColumn(nullable=false)
     */
    private Restaurant $restaurant;

    /**
     * @ORM\OneToMany(targetEntity=MenuHasMenuSection::class, mappedBy="menu", orphanRemoval=true)
     */
    private $menuHasMenuSections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuHasMenuSections = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Menu
     */
    public function setId(int $id): Menu
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Menu
     */
    public function setName(string $name): Menu
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Menu
     */
    public function setDescription(string $description): Menu
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActivate(): bool
    {
        return $this->activate;
    }

    /**
     * @param bool $activate
     * @return Menu
     */
    public function setActivate(bool $activate): Menu
    {
        $this->activate = $activate;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlSlug(): string
    {
        return $this->urlSlug;
    }

    /**
     * @param string $urlSlug
     * @return Menu
     */
    public function setUrlSlug(string $urlSlug): Menu
    {
        $this->urlSlug = $urlSlug;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getInsertDateDb()
    {
        return $this->insertDateDb;
    }

    /**
     * @param \DateTimeImmutable $insertDateDb
     * @return Menu
     */
    public function setInsertDateDb($insertDateDb)
    {
        $this->insertDateDb = $insertDateDb;
        return $this;
    }

    /**
     * @return Restaurant
     */
    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    /**
     * @param Restaurant $restaurant
     * @return Menu
     */
    public function setRestaurant(Restaurant $restaurant): Menu
    {
        $this->restaurant = $restaurant;
        return $this;
    }

    /**
     * @return Collection|MenuHasMenuSection[]
     */
    public function getMenuHasMenuSections(): Collection
    {
        return $this->menuHasMenuSections;
    }

    public function addMenuHasMenuSection(MenuHasMenuSection $menuHasMenuSection): self
    {
        if (!$this->menuHasMenuSections->contains($menuHasMenuSection)) {
            $this->menuHasMenuSections[] = $menuHasMenuSection;
            $menuHasMenuSection->setMenu($this);
        }

        return $this;
    }

    public function removeMenuHasMenuSection(MenuHasMenuSection $menuHasMenuSection): self
    {
        if ($this->menuHasMenuSections->removeElement($menuHasMenuSection)) {
            // set the owning side to null (unless already changed)
            if ($menuHasMenuSection->getMenu() === $this) {
                $menuHasMenuSection->setMenu(null);
            }
        }

        return $this;
    }


}
