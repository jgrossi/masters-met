<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class ParsCit implements ExtractorInterface
{
	protected $output;
	protected $rawOutput;

	private $emails;

	public function __construct($output)
	{
		$this->rawOutput = $output;
		$this->output = new SimpleXMLElement($output);
	}

	public function getTitle()
	{
		try {
			
			$title = (string) $this->output->algorithm[0]->variant->title;
			$title = str_replace("\n", ' ', $title);
			$title = trim($title, '.');

			return trim($title);

		} catch (Exception $e) {
			return '';
		}
	}

	public function getAuthors()
	{
		try {

			$author = (string) $this->output->algorithm[0]->variant->author;
			$author = str_replace(' and ', ',', $author);
			$author = str_replace("\n", '', $author);
			$authors = explode(',', $author);
			$authors = array_filter($authors);

			foreach ($authors as $key => &$author) {
				$author = trim($author, "*");
				$author = trim($author);
			}

			return $authors;
			
		} catch (Exception $e) {
			
		}
	}

	public function getEmails()
	{
		try {

			$email = (string) $this->output->algorithm[0]->variant->email;
			$email = $this->tokenizeEmailString($email);
			$email = str_replace(["\n"], ' ', $email);
			$emails = explode(' ', $email);
			$emails = filter_var_array($emails, FILTER_VALIDATE_EMAIL);

			return array_filter($emails);
			
		} catch (Exception $e) {
			return [];			
		}
	}

	private function tokenizeEmailString($string)
	{
		// {john, mary, johane}@example.com
		
		if (empty($string) or strpos($string, '{') === false or strpos($string, '@') === false) {
			return $string;
		}
		
		$parts = explode('@', $string);
		$names = $parts[0];
		$domain = $parts[1];

		$names = str_replace(['{', '}'], '', $names);
		$names = explode(',', $names);

		$return = [];

		foreach ($names as $key => $name) {
			$name = trim($name);
			$email = $name.'@'.$domain;
			$return[] = $email;
		}

		return implode(' ', $return);
	}

	public function getAbstract()
	{
		$abstract = (string) $this->output->algorithm[0]->variant->bodyText[0];
		$abstract = preg_replace("/\n/", '', $abstract);
		$abstract = trim($abstract);

		return $abstract;
	}

	public function getReferences()
	{
		$citeseer = new CiteSeer($this->rawOutput);
		$algorithms = $this->output->algorithm;

		return $citeseer->getReferencesFromAlgorithms($algorithms);
	}
}

