<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBathersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bathers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image',255)->nullable();
			$table->string('name',255);
			$table->string('title',255);
			$table->string('tel',50);
			$table->text('description')->nullable();
			$table->timestamp('expire');
			$table->string('dealer_price',50);
			$table->string('amed_price',50);
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
		Schema::drop('bathers');
	}

}
