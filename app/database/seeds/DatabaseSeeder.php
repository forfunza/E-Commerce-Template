<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('EntitiesTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('AboutsTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('BeforesTableSeeder');
		$this->call('CelebritiesTableSeeder');
		$this->call('ConsultsTableSeeder');

		$this->call('KnowledgesTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('PromotionsTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('ServicesTableSeeder');
		
		
		
	}

}
