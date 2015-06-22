<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class CiteSeer implements ExtractorInterface
{
	protected $output;

	public function __construct($output)
	{
		$this->output = new SimpleXMLElement($output);
	}

	public function getTitle()
	{
		try {
			
			$title = (string) $this->output->{'TEI'}
				->{'teiHeader'}->{'fileDesc'}
				->{'titleStmt'}->{'title'};

			return $title;

		} catch (Exception $e) {
			return '';	
		}
	}

	public function getAuthors()
	{
		try {
			
			

		} catch (Exception $e) {
			
		}
	}

	public function getEmails()
	{
		
	}

	public function getAbstract()
	{
		
	}

	public function getReferences()
	{
		
	}
}

