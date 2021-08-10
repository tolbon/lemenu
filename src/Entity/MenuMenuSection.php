<?php

namespace App\Entity;

use App\Repository\MenuMenuSectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(uniqueConstraints={
 *  @ORM\UniqueConstraint(name="UNIQ_79AEC8DF98E57", columns={"menu_id", "menu_section_id"}), 
 *  @ORM\UniqueConstraint(name="UNIQ_9AEC8DF98E57A2", columns={"menu_id", "menu_section_parent_id", "position"})
 * })
 * @ORM\Entity(repositoryClass=MenuMenuSectionRepository::class)
 */
class MenuMenuSection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="menuMenuSections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity=MenuSection::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $menuSectionParent;

    /**
     * @ORM\ManyToOne(targetEntity=MenuSection::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $menuSection;

    /**
     * @ORM\Column(type="smallint")
     */
    private $position;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertDateAt;

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

    public function getMenuSectionParent(): ?MenuSection
    {
        return $this->menuSectionParent;
    }

    public function setMenuSectionParent(?MenuSection $menuSectionParent): self
    {
        $this->menuSectionParent = $menuSectionParent;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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
}
