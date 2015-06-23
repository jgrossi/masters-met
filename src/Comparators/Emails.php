<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Emails implements ComparatorInterface
{
	public static function compare($first, $second)
	{
		if (is_null($second)) {
			return 0;
		}

		$sum = 0;
		$count = 0;

		foreach ($first as $i => $email) {


			if (empty($email)) { // Do not have email address
				continue;
			}

			$count++;

			if (in_array($email, $second)) {
				$percent = 100;
			} else {
				$percent = 0;
			}

			$sum += $percent;
		}

		if ($count == 0) {
			return -1;
		}

		$average = $sum / $count;

		return (float) number_format($average, 2);
	}
}