<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Title implements ComparatorInterface
{
    public static function compare($first, $second)
    {
        $first = static::sanitize($first);
        $second = static::sanitize($second);

        similar_text($first, $second, $result);

        return (float) number_format($result, 2);
    }

    public static function sanitize($string)
    {
        $string = trim($string, "/?!@#$%^&*∗`~=");

        return trim($string);
    }
}