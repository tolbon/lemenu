<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\IngredientTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * IngredientTag
 *
 * @ORM\Table(name="ingredient_tag", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 * @ORM\Entity(repositoryClass=IngredientTagRepository::class)
 */
class IngredientTag
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
     * @ORM\Column(name="description", type="string", length=180, nullable=false)
     */
    private string $description;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="ingredientTags")
     */
    private ArrayCollection $attach;

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
     * @return Collection|Ingredient[]
     */
    public function getAttach(): Collection
    {
        return $this->attach;
    }

    public function addAttach(Ingredient $attach): self
    {
        if (!$this->attach->contains($attach)) {
            $this->attach[] = $attach;
        }

        return $this;
    }

    public function removeAttach(Ingredient $attach): self
    {
        $this->attach->removeElement($attach);

        return $this;
    }

}
