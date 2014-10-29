<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBathersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bathers', function(Blueprint $table)
		{
			$table->string('dealer',255)->after('name');
			$table->integer('dealer_price')->after('dealer');
			$table->integer('amed_price')->after('dealer_price');
			$table->timestamp('expire')->after('amed_price');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bathers', function(Blueprint $table)
		{
			
		});
	}

}
