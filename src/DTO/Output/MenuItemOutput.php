<?php
declare(strict_types=1);

namespace App\DTO\Output;


use App\Entity\Allergy;
use App\Entity\Diet;
use App\Entity\LabelMenuItem;

final class MenuItemOutput
{
    public $id;

    public string $name;

    public string $description;

    public ?float $price = null;
    /** @var array<LabelMenuItem> */
    public array $labels;
    /** @var array<Allergy> */
    public array $allergens;
    /** @var array<Diet> */
    public array $diets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuSections = [];
    }
}