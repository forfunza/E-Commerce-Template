<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		
			Contact::create([
				'image' => $faker->imageUrl($width = 640, $height = 480),
				'name_1' => 'Amed international group co.,ltd',
				'name_2' => 'บริษัทเอเมด อินเตอร์เนชั่นแนล กรุ๊ป จำกัด',
				'address' => $faker->address,
				'tel' => $faker->phoneNumber,
				'fax' => $faker->phoneNumber,
				'email_1' => $faker->email,
				'email_2' => $faker->email,
				'email_3' => $faker->email

			]);
		
	}

}