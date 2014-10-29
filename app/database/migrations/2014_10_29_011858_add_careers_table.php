<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCareersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('careers', function(Blueprint $table)
		{
			if (Schema::hasColumn('careers', 'string'))
			{
			    $table->dropColumn('string');
			}
			$table->string('name',255)->after('id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('careers', function(Blueprint $table)
		{
			
		});
	}

}
