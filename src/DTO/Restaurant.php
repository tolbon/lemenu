<?php
declare(strict_types=1);

namespace App\DTO;

class Restaurant
{
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var Menu[]|null */
    public $hasMenu = null;
    /** @var string */
    public $currency = '€';
}