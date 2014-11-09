<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$image = array(
			'1' => 'http://www.coolspacelab.com/amed/public/farms/images/products/1412037087.jpg',
			'2' => 'http://www.coolspacelab.com/amed/public/farms/images/products/1412036820.jpg'
			);

		foreach(range(1, 40) as $index)
		{
			

			$img_id = $faker->numberBetween($min = 1, $max = 2);
			$category_id = $faker->numberBetween($min = 9, $max = 12);
			Product::create([
				'category_id' => $category_id,
				'name' => $faker->word,
				'code' => $faker->ean13,
				'highlight' => $faker->sentence($nbWords = 6),
				'description' => $faker->text,
				'quantity' => $faker->numberBetween($min = 10, $max = 1000),
				'image' => $image[$img_id],
				'best_sell' => $faker->numberBetween($min = 0, $max = 1)


			]);
		}
	}

}