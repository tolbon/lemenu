<?php


namespace App\DTO;


class MenuItem
{
    /** @var string */
    public $name;
    /** @var string */
    public $description;

    /** @var float|null */
    public $price;

    public function getFormattedName() {
        $replacements = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', '$', ',', '/', '?', '%', '#', '[', ']', ' '];

        $str = str_replace('@', 'a', $this->name);

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        return mb_strtolower(str_replace($replacements, '-', $str));
    }
}