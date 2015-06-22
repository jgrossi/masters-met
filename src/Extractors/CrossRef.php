<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class CrossRef implements ExtractorInterface
{
	protected $output;

	private $emails;

	public function __construct($output)
	{
		$this->output = new SimpleXMLElement($output);
	}

	public function getTitle()
	{
		try {
			
			$title = (string) $this->output->title;
			$title = str_replace("\n", ' ', $title);

			return trim($title, '.');

		} catch (Exception $e) {
			return '';
		}
	}

	public function getAuthors()
	{
		// nothing to extract
	}

	public function getEmails()
	{
		// nothing to extract
	}

	public function getAbstract()
	{
		// nothing to extract
	}

	public function getReferences()
	{
		$refs = $this->output->reference;
		$return = [];

		foreach ($refs as $key => $ref) {
			$return[] = [
				'title' => (string) $ref,
				'authors' => (string) $ref,
			];
		}

		$return = array_filter($return);

		return array_slice($return, 0, 5);
	}
}

