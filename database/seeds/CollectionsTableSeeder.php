<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Met\Models\Collection;

class CollectionsTableSeeder extends Seeder {

	public function run()
	{
		$first_collection = Collection::where('name', 'My First Demo Collection')->first();

		if (! $first_collection) {
			Collection::create([
				'id' => 1,
				'name' => 'My First Demo Collection',
				'status' => 'new',
			]);
		}
	}

}
