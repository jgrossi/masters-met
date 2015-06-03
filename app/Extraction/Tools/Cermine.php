<?php 

namespace Met\Extraction\Tools;

use Met\Extraction\Paper;
use Met\Models\File;

class Cermine implements Paper
{
	protected $result;

	protected $file;

	public function __construct(File $file)
	{
		$this->file = $file;
	}

	public function extract()
	{
		$file_path = $this->file->getFullPath();
		$command = "./tools_source/cermine.sh {{$file_path}}";

		$this->result = shell_exec($command);
	}

	public function getTitle()
	{
		# code...
	}
}