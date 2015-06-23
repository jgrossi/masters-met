<?php 

namespace App\Comparators;

use App\ComparatorInterface;
use App\Comparators\Title as TitleComparator;
use App\Comparators\Authors as AuthorsComparator;

class References implements ComparatorInterface
{
	public static function compare($first, $second)
	{
        $sum = 0;

        foreach ($first as $key => $ref) {

        	// title comparison
        	$t1 = $ref->title;

            if (!isset($second[$key]['title'])) {
                continue;
            }

        	$t2 = $second[$key]['title'];
        	$t_percent = TitleComparator::compare($t1, $t2);

            // authors comparison
        	$a1 = $ref->authors;

        	$a1 = array_map(function($value) {
                return static::orderName($value);
        	}, $a1);

        	$a2 = $second[$key]['authors'];
            
            if (!is_array($a2)) {
                $a2 = [$a2];
            }
            
            $a2 = array_map(function($value) {
                return static::orderName($value);
            }, $a2);

        	$a_percent = AuthorsComparator::compare($a1, $a2);
        	$sum += ($t_percent*60 + $a_percent*40)/100;
        }

        return round($sum/count($first), 2);
	}

	public static function sanitizeAuthorName($name)
	{
		$name = str_replace([',', '.', '-'], ' ', $name);
		$name = preg_replace('/\s+/', ' ', $name);

		return trim($name);
	}

    public static function orderName($name)
    {
        preg_match_all('/([A-Z][a-z-\']{3,})/', $name, $matches);
        $surnames = $matches[1];
        $name = str_replace($surnames, '', $name).' '.implode(' ', $surnames);

        $name = static::sanitizeAuthorName($name);

        return $name;
    }
}