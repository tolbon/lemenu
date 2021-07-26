<?php

namespace App\Entity;

use App\Repository\MenuHasMenuSectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuHasMenuSectionRepository::class)
 */
class MenuHasMenuSection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="menuHasMenuSections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity=MenuSection::class, inversedBy="menuHasMenuSections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menuSection;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $insertDateDb;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getMenuSection(): ?MenuSection
    {
        return $this->menuSection;
    }

    public function setMenuSection(?MenuSection $menuSection): self
    {
        $this->menuSection = $menuSection;

        return $this;
    }

    public function getInsertDateDb(): ?\DateTimeImmutable
    {
        return $this->insertDateDb;
    }

    public function setInsertDateDb(\DateTimeImmutable $insertDateDb): self
    {
        $this->insertDateDb = $insertDateDb;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }
}
