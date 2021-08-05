<?php
declare(strict_types=1);

namespace App\DTO\Output;


final class MenuSectionOutput
{
    public $id;

    public string $name;

    public string $description;

    public ?float $price1;
    public ?float $price2;
    public ?float $price3;

    public ?string $titlePrice1;
    public ?string $titlePrice2;
    public ?string $titlePrice3;

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