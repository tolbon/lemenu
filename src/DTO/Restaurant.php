<?php
declare(strict_types=1);

namespace App\DTO;

class Restaurant
{
    /** @var string */
    public string $name;
    /** @var string */
    public string $description;
    /** @var Menu[]|null */
    public ?array $hasMenu = null;
    /** @var string */
    public string $currency = 'EUR'; //TWIG {{ '1000000'|format_currency('EUR') }}
}