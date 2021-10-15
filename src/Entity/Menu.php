<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @ORM\Table(uniqueConstraints={
 *  @ORM\UniqueConstraint(name="UNIQ_8D03E649E7927704", columns={"restaurant_id", "name"}), 
 *  @ORM\UniqueConstraint(name="UNIQ_8E03F6E506817D74", columns={"restaurant_id", "url_slug", "activate"})
 * })
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 * 
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $activate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $urlSlug;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private ?DateTimeImmutable $insertDateAt;

    /**
     * @ORM\OneToMany(targetEntity=MenuMenuSection::class, mappedBy="menu", orphanRemoval=true)
     * @var ArrayCollection<int, MenuMenuSection>
     */
    private $menuMenuSections;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Restaurant $restaurant;

    public function __construct()
    {
        $this->menuMenuSections = new ArrayCollection();
        $this->urlSlug = null;
        $this->activate = true;
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

    public function getActivate(): ?bool
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

    public function setUrlSlug(string $urlSlug): self
    {
        $this->urlSlug = $urlSlug;

        return $this;
    }

    public function getInsertDateAt(): ?DateTimeImmutable
    {
        return $this->insertDateAt;
    }

    public function setInsertDateAt(DateTimeImmutable $insertDateAt): self
    {
        $this->insertDateAt = $insertDateAt;

        return $this;
    }

    /**
     * @return Collection|MenuMenuSection[]
     */
    public function getMenuMenuSections(): Collection
    {
        return $this->menuMenuSections;
    }

    public function addMenuMenuSection(MenuMenuSection $menuMenuSection): self
    {
        if (!$this->menuMenuSections->contains($menuMenuSection)) {
            $this->menuMenuSections[] = $menuMenuSection;
            $menuMenuSection->setMenu($this);
        }

        return $this;
    }

    public function removeMenuMenuSection(MenuMenuSection $menuMenuSection): self
    {
        if ($this->menuMenuSections->removeElement($menuMenuSection)) {
            // set the owning side to null (unless already changed)
            if ($menuMenuSection->getMenu() === $this) {
                $menuMenuSection->setMenu(null);
            }
        }

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

    public function computeSlug(SluggerInterface $slugger): void
    {
        if (!$this->urlSlug || '-' === $this->urlSlug) {
            $this->setUrlSlug((string)$slugger->slug($this->name)->lower());
        }
    }

    public function __toString()
    {
        return "{$this->name}";
    }
}
