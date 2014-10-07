<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image',255);
			$table->string('name',255);
			$table->string('highlight',255)->nullable();
			$table->text('description')->nullable();
			$table->string('url',255)->nullable();
			$table->string('tel',255)->nullable();
			$table->string('facebook',255)->nullable();
			$table->string('instagram',255)->nullable();
			$table->string('line',255)->nullable();
			$table->string('website',255)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
