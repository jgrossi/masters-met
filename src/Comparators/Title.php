<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Title implements ComparatorInterface
{
	public static function compare($first, $second)
	{
        $first = trim($first, "/?!@#$%^&*∗`~=");
        $second = trim($second, "/?!@#$%^&*∗`~=");

        $first = trim($first);
		$second = trim($second);

		similar_text($first, $second, $result);

		return $result;
	}
}