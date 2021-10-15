<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuSectionMenuItemRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Table(uniqueConstraints={
 *  @ORM\UniqueConstraint(name="UNIQ_AE73CD8F89E37", columns={"menu_section_id", "menu_item_id"}), 
 *  @ORM\UniqueConstraint(name="UNIQ_A9CE8DE89E572", columns={"menu_section_id", "position"})
 * })
 * @ORM\Entity(repositoryClass=MenuSectionMenuItemRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class MenuSectionMenuItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=MenuSection::class, inversedBy="menuSectionMenuItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?MenuSection $menuSection;

    /**
     * @ORM\ManyToOne(targetEntity=MenuItem::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?MenuItem $menuItem;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $position;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private ?DateTimeImmutable $insertDateAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMenuSection(): ?MenuSection
    {
        return $this->menuSection;
    }

    public function setMenuSection(?MenuSection $menuSection): self
    {
        $this->menuSection = $menuSection;

        return $this;
    }

    public function getMenuItem(): ?MenuItem
    {
        return $this->menuItem;
    }

    public function setMenuItem(?MenuItem $menuItem): self
    {
        $this->menuItem = $menuItem;

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
     * @ORM\PrePersist
     */
    public function setInsertDateAtDefault(): void 
    {
        $this->insertDateAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function validateRestaurant(): void 
    {
        if ($this->menuSection->getRestaurant()->getId() !== $this->menuItem->getRestaurant()->getId()) {
            throw new InvalidArgumentException("menuSection and menuItem have different restaurant Id ??? Hack ? {$this->menuSection->getName()} - {$this->menuItem->getName()}");
        }
    }
}
