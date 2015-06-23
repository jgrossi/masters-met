<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Abstracts implements ComparatorInterface
{
	public static function compare($first, $second)
	{
        $first = trim($first, "/?!@#$%^&*∗`~=");
        $second = trim($second, "/?!@#$%^&*∗`~=");

        $first = trim($first);
		$second = trim($second);

		similar_text($first, $second, $result);
		$result = round($result, 2);

		return number_format($result, 2);
	}
}