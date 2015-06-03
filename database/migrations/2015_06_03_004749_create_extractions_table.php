<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtractionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extractions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('collection_id');
			$table->string('status');
			$table->timestamp('created_at');
			$table->timestamp('extracted_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extractions');
	}

}