<?php

namespace Met\Extraction;

interface ComparisonInterface
{

    public function __construct($correct, $found);

    public function calculate();

    public function getResult();

    public function sanitize($value);
}