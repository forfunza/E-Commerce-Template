<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WebsitesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		
		Website::create([
			'image' => 'http://lorempixel.com/800/600/sports/1/'
		]);
		
	}

}