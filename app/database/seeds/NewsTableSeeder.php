<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			News::create([
				'name' => $faker->word,
		  		'image' => $faker->imageUrl($width = 640, $height = 480),
		  		'description' => $faker->text
			]);
		}
	}

}