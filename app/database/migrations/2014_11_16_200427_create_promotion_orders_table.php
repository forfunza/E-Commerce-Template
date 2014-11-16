<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotion_orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('promotion_id')->unsigned()->index();
			$table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
			$table->string('invoice_id',255);
			$table->string('order_status',2);
			$table->string('firstname',255);
			$table->string('lastname',255);
			$table->string('tel',255);
			$table->string('email',255);
			$table->string('address',255);
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
		Schema::drop('promotion_orders');
	}

}
