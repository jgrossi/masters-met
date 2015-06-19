<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class Cermine implements ExtractorInterface
{
	protected $output;

	public function __construct($output)
	{
		$this->output = new SimpleXMLElement($output);
	}

	public function getTitle()
	{
		if (isset($this->output->front
			->{'article-meta'}
			->{'title-group'}
			->{'article-title'})) {
			
			return $this->output->front
			->{'article-meta'}
			->{'title-group'}
			->{'article-title'};
		}

		return '';
	}

	public function getAuthors()
	{

	}

	public function getEmails()
	{
		# code...
	}

	public function getAbstract()
	{
		# code...
	}

	public function getReferences()
	{
		# code...
	}
}

