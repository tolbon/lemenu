<?php


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

    public function getFormattedName() {
        $replacements = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', '$', ',', '/', '?', '%', '#', '[', ']', ' '];

        $str = str_replace('@', 'a', $this->name);

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        return mb_strtolower(str_replace($replacements, '-', $str));
    }
}