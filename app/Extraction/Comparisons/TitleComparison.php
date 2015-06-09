<?php

namespace Met\Extraction\Comparisons;

use Met\Extraction\ComparisonInterface;

class TitleComparison implements ComparisonInterface
{
    protected $correct;

    protected $found;

    protected $result;

    public function __construct($correct, $found)
    {
        $this->correct = $correct;
        $this->found= $this->sanitize($found);
    }

    public function calculate()
    {
        similar_text($this->correct, $this->found, $sim);

        if ($sim < 100) {
            $sim = number_format($sim, 2);
        }

        $this->result = $sim;
    }

    public function sanitize($title)
    {
        $title = trim($title);

        $title = trim($title, "/?!@#$%^&*`~=");

        return $title;
    }


    public function getResult()
    {
        return $this->result;
    }
}