<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Authors implements ComparatorInterface
{
	public static function compare($first, $second)
	{
        message($first);
        message($second);
        exit();

		similar_text($first, $second, $result);

		return $result;
	}
}