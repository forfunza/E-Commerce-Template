<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BeforesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Before::create([
				'name' => $faker->word,
				'author' => $faker->name,
		  		'image' => $faker->imageUrl($width = 640, $height = 480),
		  		'description' => $faker->text

			]);
		}
	}

}