<?php 

namespace App\Comparators;

use App\ComparatorInterface;
use App\Comparators\Title as TitleComparator;
use App\Comparators\Authors as AuthorsComparator;

class References implements ComparatorInterface
{
	public static function compare($first, $second)
	{
        foreach ($first as $key => $ref) {

        	// title comparison
        	$t1 = $ref->title;
        	$t2 = $second[$key]['title'];
        	$t_percent = TitleComparator::compare($t1, $t2);

        	$a1 = $ref->authors;

        	$a1 = array_map(function($value) {
        		return static::sanitizeAuthorName($value);
        	}, $a1);

        	var_dump($a1);
        	$a2 = $second[$key]['authors'];
        	var_dump($a2);
        	$a_percent = AuthorsComparator::compare($a1, $a2);

        	echo "Result for title: $t_percent\n";
        	echo "Result for authors: $a_percent\n";

        	return round(($t_percent*60 + $a_percent*40)/100, 2);
        }
	}

	public static function sanitizeAuthorName($name)
	{
		$name = str_replace([',', '.'], ' ', $name);
		$name = preg_replace('/\s+/', ' ', $name);

		return $name;
	}
}