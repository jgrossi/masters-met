<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class Cermine implements ExtractorInterface
{
	protected $output;

	private $emails;

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
		$authors = [];
		$emails = [];

		try {
			$rows = $this->output->front
				->{'article-meta'}
				->{'contrib-group'}
				->{'contrib'};

			foreach ($rows as $key => $row) {
				$authors[] = (string) $row->{'string-name'};
				$emails[] = (string) $row->{'email'};
			}

			$this->emails = $emails;

			return $authors;
		} catch (Exception $e) {
			return [];			
		}
	}

	public function getEmails()
	{
		if (isset($this->emails) and $this->emails) {
			return $this->emails;
		} else {
			$this->getAuthors();
			return $this->emails;
		}
	}

	public function getAbstract()
	{
		try {
			$abstract = $this->output->front
				->{'article-meta'}
				->{'abstract'};

			if (isset($abstract->p)) {
				return (string) $abstract->p;
			} else {
				return $abstract;
			}

		} catch (Exception $e) {
			return '';
		}
	}

	public function getReferences()
	{
		$refereces = [];

		try {
			$refs = $this->output->back->{'ref-list'}->ref;
			$count = 0;

			foreach ($refs as $key => $ref) {

				if ($count > 4) {
					break;
				}

				$stringname = $ref->{'mixed-citation'}->{'string-name'};

				if (count($stringname) > 0) {
					$authors = [];
					foreach ($stringname as $key => $author) {
						$name = trim($author->surname) .' '. trim($author->{'given-names'});
						$name = str_replace(',', '', $name);
						$authors[] = $name;
					}
				} else {
					$name = trim($stringname->surname) .' '. trim($stringname->{'given-names'});
					$name = str_replace(',', '', $name);
					$authors = [$name];
				}
				
				$title = (string) $ref->{'mixed-citation'}->{'article-title'};
				$title = trim($title, '.');

				$refereces[] = [
					'title' => $title,
					'authors' => $authors, 
				];

				$count++;
			}

			return $refereces;

		} catch (Exception $e) {
			return '';
		}
	}
}

