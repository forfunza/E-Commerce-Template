<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatherImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bather_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bather_id')->unsigned()->index();
			$table->foreign('bather_id')->references('id')->on('bathers')->onDelete('cascade');
			$table->string('images',255);
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
		Schema::drop('bather_images');
	}

}
