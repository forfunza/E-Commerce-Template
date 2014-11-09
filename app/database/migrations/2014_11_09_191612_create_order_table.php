<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('invoice_id',255);
			$table->string('order_status',2);
			$table->string('tel',255);
			$table->string('building',255)->nullable();
			$table->string('room',255)->nullable();
			$table->string('floor',255)->nullable();
			$table->string('no',255)->nullable();
			$table->string('moo',255)->nullable();
			$table->string('mooban',255)->nullable();
			$table->string('soi',255)->nullable();
			$table->string('road',255)->nullable();
			$table->string('sub_district',255);
			$table->string('district',255);
			$table->string('province',255);
			$table->string('postcode',255);
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
		Schema::drop('order');
	}

}
