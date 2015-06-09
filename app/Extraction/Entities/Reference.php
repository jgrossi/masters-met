<?php

namespace Met\Extraction\Entities;

class Reference
{
    protected $title;

    protected $authors = [];

    function __construct($title, array $authors)
    {
        $this->title = $title;
        $this->authors = $authors;
    }

    /**
     * @return array
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param array $authors
     */
    public function setAuthors(array $authors)
    {
        $this->authors = $authors;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}