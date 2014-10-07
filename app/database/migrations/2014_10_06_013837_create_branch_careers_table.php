<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchCareersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_careers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('branch_id')->unsigned()->index();
			$table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
			$table->text('requirement');
			$table->text('identify');
			$table->text('other');
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
		Schema::drop('branch_careers');
	}

}
