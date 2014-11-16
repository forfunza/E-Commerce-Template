<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_discounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname',255);
			$table->string('lastname',255);
			$table->string('tel',20);
			$table->string('email',100);
			$table->string('address',255);
			$table->string('problem',255);
			$table->string('branch',255);
			$table->string('contact',100);
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
		Schema::drop('service_discounts');
	}

}
