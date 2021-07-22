<?php
declare(strict_types=1);

namespace App\DTO;

class MenuSection
{
    /** @var string */
    public string $name;
    /** @var string */
    public string $description;
    /** @var float */
    public float $price;
    /** @var MenuSection[]|null  */
    public ?array $hasMenuSection = null;
    /** @var MenuItem[]|null  */
    public ?array $hasMenuItem = null;

}