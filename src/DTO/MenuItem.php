<?php
declare(strict_types=1);

namespace App\DTO;

class MenuItem
{
    /** @var string */
    public string $name;
    /** @var string */
    public string $description;
    /** @var float|null */
    public float $price;

}