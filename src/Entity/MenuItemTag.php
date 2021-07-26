<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MenuItemTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItemTag
 *
 * @ORM\Table(name="menu_item_tag", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 * @ORM\Entity(repositoryClass=MenuItemTagRepository::class)
 */
class MenuItemTag
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
     * @ORM\Column(name="name", type="string", length=180, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @\ManyToMany(targetEntity="MenuItem", inversedBy="menuItemTag")
     * @\JoinTable(name="menu_item_tag_menu_item",
     *   joinColumns={
     *     @\JoinColumn(name="menu_item_tag_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @\JoinColumn(name="menu_item_id", referencedColumnName="id")
     *   }
     * )
     */
    /**
    * @ORM\ManyToMany(targetEntity=MenuItem::class, inversedBy="menuItemTags")
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