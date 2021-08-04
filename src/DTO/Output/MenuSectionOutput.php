<?php
declare(strict_types=1);

namespace App\DTO\Output;


final class MenuSectionOutput
{
    public $id;

    public string $name;

    public string $description;

    public ?float $price;

    public bool $displayCurrencySymbolOnTitle;

    public bool $displayCurrencySymbolOnChildren;

    public bool $displayDescriptionAfterChildren;

    public bool $displayChildrenSectionAfterMenuItems;

    public array $menuSections;

    public array $hasMenuItem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuSections = [];
    }
}