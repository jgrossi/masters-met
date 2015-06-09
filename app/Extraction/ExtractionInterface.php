<?php

namespace Met\Extraction;

use Met\Models\Collection;

interface ExtractionInterface
{
    public function execute(Collection $collection_id);

    public function getTitle();

    public function getAuthors();

    public function getAbstract();

    public function getReferences();

}