<?php 

namespace App\Extractors;

use App\ExtractorInterface;
use SimpleXMLElement;

class CiteSeer implements ExtractorInterface
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
		$return = [];
		$emails = [];

		try {
			
			$authors = $this->output->{'TEI'}
				->{'teiHeader'}->{'fileDesc'}
				->{'sourceDesc'}->{'biblStruct'}
				->{'analytic'}->{'author'};

			foreach ($authors as $key => $author) {
				
				$emails[] = (string) $author->{'email'};

				$name = '';
				$tag = $author->{'persName'};
				$forename = $tag->{'forename'};
				
				if ($forename) {
					foreach ($forename as $key => $fname) {
						$name .= (string) $fname . ' ';
					}
				}

				$surname = $tag->{'surname'};

				if ($surname) {
				 	foreach ($surname as $key => $sname) {
					 	$name .= (string) $sname . ' ';
					}
				} 
				
				$return[] = trim($name);
			}

			$this->emails = array_filter($emails);

			return array_filter($return);

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
			
			$abstract = $this->output->{'TEI'}
				->{'teiHeader'}->{'profileDesc'}->{'abstract'};

			if (isset($abstract->p)) {
				return (string) $abstract->p;
			} else {
				return (string) $abstract;
			}

		} catch (Exception $e) {
			return '';
		}
	}

	public function getReferences()
	{
		$algorithms = $this->output->algorithms->algorithm;
		
		return $this->getReferencesFromAlgorithms($algorithms);
	}

	public function getReferencesFromAlgorithms($algorithms)
	{
		$return = [];

		foreach ($algorithms as $key => $alg) {
			
			$attrs = $alg->attributes();

			if (isset($attrs['name']) and $attrs['name'] == 'ParsCit') {
				
				$refs = $alg->citationList->citation;
				
				foreach ($refs as $key => $ref) {
					
					$attrs = $ref->attributes();

					if ($attrs['valid'] == 'false') {
						continue;
					}

					$title = (string) $ref->title;
					$authors = (array) $ref->authors->author;
					$authors = array_filter($authors);

					foreach ($authors as $key => &$author) {
						$author = str_replace(['.', ','], '', $author);
					}

					$return[] = [
						'title' => trim($title, '.'),
						'authors' => $authors,
					];
				}
			}
		}

		return array_slice($return, 0, 5);
	}
}

