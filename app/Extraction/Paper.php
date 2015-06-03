<?php 

namespace Met\Extraction;

interface Paper
{
	public function extract();

	public function getTitle();

	public function getAuthors();

	public function getEmails();

	public function getAbstrat();

	public function getReferences();
}