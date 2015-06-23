<?php 

namespace App\Comparators;

use App\ComparatorInterface;

class Authors implements ComparatorInterface
{
    public static function compare($first, $second)
    {
        $sum = 0;

        foreach ($first as $i => $author) {
            if (isset($second[$i])) {
                similar_text($author, $second[$i], $percent);
            } else {
                $percent = 0;
            }

            $sum += $percent;
        }

        $total = count($first);

        if ($total == 0) {
            return -1;
        }

        $average = $sum / $total;

        return (float) number_format($average, 2);
    }
}