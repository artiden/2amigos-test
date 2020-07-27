<?php

use Illuminate\Database\Seeder;
//use Faker;
use Faker\Factory;
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Task::create([
                'description' => $faker->sentence,
                'done' => $faker->boolean,
            ]);
        }
        // $this->call(UserSeeder::class);
    }
}
