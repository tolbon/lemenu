<?php
declare(strict_types=1);

namespace App\DTO;


class Menu
{
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var MenuItem[]|null  */
    public $hasMenuItem = null;
    /** @var MenuSection[]|null  */
    public $hasMenuSection = null;
}