<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		
			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Anti Aging'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Auto Smooth'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Botox'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'V-Face'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Face Perfect'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Body Attraction'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Six Pack Fast Track'
					)
				);

			Category::create(
				array(
						'entity_id' => 1,
						'name' => 'Face Rejuvenate'
					)
				);

			Category::create(
				array(
						'entity_id' => 2,
						'name' => 'Nourishing'
					)
				);
			Category::create(
				array(
						'entity_id' => 2,
						'name' => 'Whitening'
					)
				);
			Category::create(
				array(
						'entity_id' => 2,
						'name' => 'Cleansing'
					)
				);
			Category::create(
				array(
						'entity_id' => 2,
						'name' => 'Serum'
					)
				);


			
		
	}

}