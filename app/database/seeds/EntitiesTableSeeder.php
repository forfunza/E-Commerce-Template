<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntitiesTableSeeder extends Seeder {

	public function run()
	{
		
		Entity::create(array('name' => 'services'));
		Entity::create(array('name' => 'products'));
		
	}

}