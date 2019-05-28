<?php


namespace App\DTO;


class MenuSection
{
    /** @var string */
    public $name;
    /** @var MenuSection[]|null  */
    public $hasMenuSection = null;
    /** @var MenuItem[]|null  */
    public $hasMenuItem = null;

}