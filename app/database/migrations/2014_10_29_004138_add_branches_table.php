<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('branches', function(Blueprint $table)
		{
			

			if (Schema::hasColumn('address', 'tel_1' , 'tel_2'))
			{
			    $table->dropColumn(array('address', 'tel_1', 'tel_2'));
			}
			
			$table->string('image',255)->after('name')->nullable();
			$table->text('description')->after('image')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('branches', function(Blueprint $table)
		{
			
		});
	}

}
