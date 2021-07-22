<?php
declare(strict_types=1);

namespace App\Service;


class FormattedNameService
{
    public const REPLACEMENT = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', ',', '/', '?', '%', '#', '[', ']', ' '];

    public function getFormattedName($name) {
        $str = str_replace(['@', '$'], ['a', 's'], $name);

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        return mb_strtolower(str_replace(self::REPLACEMENT, '-', $str));
    }
}