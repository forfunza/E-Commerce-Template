<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image',255);
			$table->string('name',255);
			$table->text('description')->nullable();
			$table->string('price',100);
			$table->dateTime('expire');
			$table->smallInteger('seller');
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
		Schema::drop('promotions');
	}

}
