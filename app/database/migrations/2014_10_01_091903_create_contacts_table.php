<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_1',255);
			$table->string('name_2',255)->nullable();
			$table->text('address');
			$table->string('tel',50);
			$table->string('fax',50)->nullable();
			$table->string('email_1',100);
			$table->string('email_2',100)->nullable();
			$table->string('email_3',100)->nullable();
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
		Schema::drop('contacts');
	}

}
