<?php


namespace App\DTO;


class Menu
{
    /** @var string */
    public $name;
    /** @var MenuItem[]|null  */
    public $hasMenuItem = null;
    /** @var MenuSection[]|null  */
    public $hasMenuSection = null;
}