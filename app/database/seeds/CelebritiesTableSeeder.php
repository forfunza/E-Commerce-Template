<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CelebritiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 12; $i++) {
		  Celebrity::create(
		  	array(
		  		'image' => $faker->imageUrl($width = 394, $height = 394 ,'fashion')
		  		)
			);
		}
	}

}