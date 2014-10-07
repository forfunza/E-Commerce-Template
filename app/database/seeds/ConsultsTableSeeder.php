<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ConsultsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Consult::create([
				'image' => $faker->imageUrl($width = 640, $height = 480,'fashion'),
				'name' => $faker->name,
				'highlight' => $faker->sentence($nbWords = 6),
				'description' => $faker->text
			]);
		}
	}

}