<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class CrossRef implements ExtractorInterface
{
	protected $output = null;

	private $emails;

	public function __construct($output)
	{
		if ($output) {
			$this->output = new SimpleXMLElement($output);
		}
	}

	public function getTitle()
	{
		try {
			
			if (! $this->output) {
				return '';
			}

			$title = (string) $this->output->title;
			$title = str_replace("\n", ' ', $title);

			return trim($title, '.');

		} catch (Exception $e) {
			return '';
		}
	}

	public function getAuthors()
	{
		return [];
	}

	public function getEmails()
	{
		return [];
	}

	public function getAbstract()
	{
		return '';
	}

	public function getReferences()
	{
		try {

			if (! $this->output) {
				return [];
			}
			
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

		} catch (Exception $e) {
			return [];	
		}
	}
}

