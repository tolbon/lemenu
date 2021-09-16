<?php
declare(strict_types=1);

namespace App\DTO\Output;


final class MenuOutput
{
    public $id;

    public string $name;

    public string $description;

    public string $urlSlug;

    /** @var array<MenuSectionOutput> */
    public array $menuSections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menuSections = [];
    }

}