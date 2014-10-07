<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PromotionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Promotion::create([
				'name' => $faker->name,
				'image' => $faker->imageUrl($width = 300, $height = 300),
				'description' => $faker->text,
				'price' => $faker->numberBetween($min = 10000, $max = 50000),
				'expire' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years'),
				'seller' => $faker->numberBetween($min = 10, $max = 50)
			]);
		}
	}

}