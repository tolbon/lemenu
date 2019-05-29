<?php


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

    public function getFormattedName() {
        $replacements = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', '$', ',', '/', '?', '%', '#', '[', ']', ' '];

        $str = str_replace('@', 'a', $this->name);

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        return mb_strtolower(str_replace($replacements, '-', $str));
    }
}