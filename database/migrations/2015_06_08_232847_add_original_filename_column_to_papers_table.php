<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOriginalFilenameColumnToPapersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('papers', function(Blueprint $table)
		{
			$table->string('original_filename')->after('file_path');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('papers', function(Blueprint $table)
		{
			$table->dropColumn('original_filename');
		});
	}

}
