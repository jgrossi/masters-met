<?php 

namespace App;

interface ExtractorInterface
{
    public function getTitle();

    public function getAuthors();

    public function getEmails();

    public function getAbstract();

    public function getReferences();
}