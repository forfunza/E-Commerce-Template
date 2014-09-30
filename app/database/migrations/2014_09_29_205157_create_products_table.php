<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->string('code',100);
			$table->string('name',255);
			$table->string('highlight',255);
			$table->text('description');
			$table->smallInteger('quantity');
			$table->string('image',255)->nullable();
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
		Schema::drop('products');
	}

}
