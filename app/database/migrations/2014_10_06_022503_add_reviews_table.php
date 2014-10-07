<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reviews', function(Blueprint $table)
		{
			$table->string('youtube',255)->nullable()->after('description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reviews', function(Blueprint $table)
		{
			
		});
	}

}
