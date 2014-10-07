<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeforesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('befores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image',255)->nullable();
			$table->string('name',255);
			$table->string('author',255);
			$table->text('description')->nullable();
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
		Schema::drop('befores');
	}

}
