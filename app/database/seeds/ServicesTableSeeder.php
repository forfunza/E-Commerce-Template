<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$c = 1;
		foreach(range(1, 32) as $index)
		{
			Service::create([
				'category_id' => $c,
				'image' => $faker->imageUrl($width = 640, $height = 480,'fashion'),
				'name' => $faker->name,
				'highlight' => $faker->sentence($nbWords = 6),
				'description' => $faker->text,
			]);
			$c++;
			if($c == 9) $c = 1;
		}
	}

}