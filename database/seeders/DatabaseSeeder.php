<?php

namespace Database\Seeders;

use Faker\Provider\Base;

use Faker\Provider\Lorem;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $faker;

    public function getFaker() {

        if (empty($this->faker)) {
            $faker = Faker::create();
        }
        return $this->faker = $faker;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StarTableSeeder::class);
    }
}
