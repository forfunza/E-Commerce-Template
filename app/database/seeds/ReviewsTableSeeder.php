<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{

			Review::create([
				'image' => $faker->imageUrl($width = 640, $height = 480,'fashion'),
				'name' => $faker->name,
				'highlight' => $faker->sentence($nbWords = 6),
				'description' => $faker->text,
				'youtube' => 'http://www.youtube.com/embed/k05S7PTDICc',
				'url' => $faker->url,
				'facebook' => 'https://www.facebook.com/amedcenter',
				'website' => $faker->url
			]);
		}
	}

}