<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuItemRepository;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(uniqueConstraints={
 *  @ORM\UniqueConstraint(name="UNIQ_8D03E146D7927704", columns={"restaurant_id", "name"})},
 * )
 * @ORM\Entity(repositoryClass=MenuItemRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class MenuItem
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
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $price1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $price2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $price3;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Restaurant $restaurant;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private ?DateTimeImmutable $insertDateAt;

    /**
     * @ORM\ManyToMany(targetEntity=Allergy::class)
     * @var ArrayCollection<int, Allergy>
     */
    private $allergies;

    /**
     * @ORM\ManyToMany(targetEntity=Diet::class)
     * @var ArrayCollection<int, Diet>
     */
    private $diets;

    public function __construct()
    {
        $this->allergies = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice1(): ?float
    {
        return $this->price1;
    }

    public function setPrice1(?float $price1): self
    {
        $this->price1 = $price1;

        return $this;
    }

    public function getPrice2(): ?float
    {
        return $this->price2;
    }

    public function setPrice2(?float $price2): self
    {
        $this->price2 = $price2;

        return $this;
    }

    public function getPrice3(): ?float
    {
        return $this->price3;
    }

    public function setPrice3(?float $price3): self
    {
        $this->price3 = $price3;

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
     * @return Collection|Allergy[]
     */
    public function getAllergies(): Collection
    {
        return $this->allergies;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergies->contains($allergy)) {
            $this->allergies[] = $allergy;
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        $this->allergies->removeElement($allergy);

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

    /**
     * @ORM\PrePersist
     */
    public function setInsertDateAtDefault(): void 
    {
        $this->insertDateAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }
}
