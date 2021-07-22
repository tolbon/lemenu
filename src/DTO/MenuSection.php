<?php
declare(strict_types=1);

namespace App\DTO;

class MenuSection
{
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var float */
    public $price;
    /** @var MenuSection[]|null  */
    public $hasMenuSection = null;
    /** @var MenuItem[]|null  */
    public $hasMenuItem = null;

}