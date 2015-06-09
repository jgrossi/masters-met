<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Met\Models\Tool;

class ToolsTableSeeder extends Seeder {

	public function run()
	{
		Tool::truncate();
		
		Tool::create([
			'name' => 'Cermine',
			'slug' => 'cermine',
			'url' => 'https://github.com/CeON/CERMINE',
		]);

		Tool::create([
			'name' => 'CiteSeer',
			'slug' => 'citeseer',
			'url' => 'http://citeseerx.ist.psu.edu/',
		]);

		Tool::create([
			'name' => 'CrossRef',
			'slug' => 'crossref',
			'url' => 'https://github.com/CrossRef/pdfextract',
		]);

		Tool::create([
			'name' => 'ParsCit',
			'slug' => 'parscit',
			'url' => 'https://github.com/knmnyn/ParsCit',
		]);
	}

}
