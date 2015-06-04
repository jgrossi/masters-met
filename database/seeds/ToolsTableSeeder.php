<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Met\Models\Tool;

class ToolsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tools')->delete();
		
		Tool::create([
			'id' => 1,
			'name' => 'Cermine',
			'slug' => 'cermine',
			'url' => 'https://github.com/CeON/CERMINE',
		]);

		Tool::create([
			'id' => 2,
			'name' => 'CiteSeer',
			'slug' => 'citeseer',
			'url' => 'http://citeseerx.ist.psu.edu/',
		]);

		Tool::create([
			'id' => 3,
			'name' => 'CrossRef',
			'slug' => 'crossref',
			'url' => 'https://github.com/CrossRef/pdfextract',
		]);

		Tool::create([
			'id' => 4,
			'name' => 'ParsCit',
			'slug' => 'parscit',
			'url' => 'https://github.com/knmnyn/ParsCit',
		]);
	}

}
