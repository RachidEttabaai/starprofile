<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Seeder;

class StarTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->getFaker();

        for ($i=0; $i <= 20; $i++) {

            Star::create([
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'image' => $faker->imageUrl,
                'description' => $faker->sentence

            ]);

        }
    }
}
