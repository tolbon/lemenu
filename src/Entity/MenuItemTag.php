<?php

namespace App\Entity;

use App\Repository\MenuItemTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuItemTagRepository::class)
 */
class MenuItemTag
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
     * @ORM\ManyToMany(targetEntity=MenuItem::class, inversedBy="menuItemTags")
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
     * @return Collection|MenuItem[]
     */
    public function getAttach(): Collection
    {
        return $this->attach;
    }

    public function addAttach(MenuItem $attach): self
    {
        if (!$this->attach->contains($attach)) {
            $this->attach[] = $attach;
        }

        return $this;
    }

    public function removeAttach(MenuItem $attach): self
    {
        $this->attach->removeElement($attach);

        return $this;
    }
}
