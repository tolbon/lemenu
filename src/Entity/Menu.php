<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(uniqueConstraints={
 *  @ORM\UniqueConstraint(name="UNIQ_8D03E649E7927704", columns={"restaurant_id", "name"}), 
 *  @ORM\UniqueConstraint(name="UNIQ_8E03F6E506817D74", columns={"restaurant_id", "url_slug", "activate"})
 * })
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
     * @ORM\Column(type="boolean")
     */
    private $activate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlSlug;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateAt;

    /**
     * @ORM\OneToMany(targetEntity=MenuMenuSection::class, mappedBy="menu", orphanRemoval=true)
     */
    private $menuMenuSections;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="menu2s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    public function __construct()
    {
        $this->menuMenuSections = new ArrayCollection();
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

    public function getInsertDateAt(): ?\DateTimeImmutable
    {
        return $this->insertDateAt;
    }

    public function setInsertDateAt(\DateTimeImmutable $insertDateAt): self
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
}
