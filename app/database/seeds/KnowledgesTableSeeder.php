<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class KnowledgesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 12; $i++) {
		  Knowledge::create([
		  		'name' => $faker->name,
		  		'image' => $faker->imageUrl($width = 640, $height = 480),
		  		'description' => $faker->text
		  		]);
		}
	}

}