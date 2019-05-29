<?php


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

    public function getFormattedName() {
        $replacements = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', '$', ',', '/', '?', '%', '#', '[', ']', ' '];

        $str = str_replace('@', 'a', $this->name);

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        return mb_strtolower(str_replace($replacements, '-', $str));
    }

}