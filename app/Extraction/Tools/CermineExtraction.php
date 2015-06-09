<?php

namespace Met\Extraction\Tools;

use Met\Extraction\ExtractionInterface;
use Met\Models\Collection;
use Met\Extraction\Entities\Author;

class CermineExtraction implements ExtractionInterface
{
    protected $xml;

    public function execute(Collection $collection_id)
    {
        $output = shell_exec("./../tools_source/cermine.sh ../storage/app/demo-data/paper-02.pdf");

        $this->xml = new \SimpleXMLElement($output);
    }

    public function getTitle()
    {
        return (string) $this->xml->front->{'article-meta'}->{'title-group'}->{'article-title'};
    }

    public function getAuthors()
    {
        // TODO: Implement getAuthors() method.
    }

    public function getAbstract()
    {
        // TODO: Implement getAbstract() method.
    }

    public function getReferences()
    {
        // TODO: Implement getReferences() method.
    }


}