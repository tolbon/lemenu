<?php
declare(strict_types=1);

namespace App\DTO;


class Menu
{
    /** @var string */
    public string $name;
    /** @var string */
    public string $description;
    /** @var MenuItem[]|null  */
    public ?array $hasMenuItem = null;
    /** @var MenuSection[]|null  */
    public $hasMenuSection = null;
}