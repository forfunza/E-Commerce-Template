<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AboutsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		
			About::create([
				'image' => $faker->imageUrl($width = 640, $height = 480),
				'description' => $faker->text
				]);
		
	}

}