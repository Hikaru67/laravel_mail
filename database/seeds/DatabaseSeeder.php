<?php

use App\Models\Template;
use Faker\Factory;
use Illuminate\Database\Seeder;

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
        for($i = 0; $i < 3; $i++){
            Template::insert([
                'name' => $faker->sentence,
                'category' => $i+1,
                'content' => $faker->paragraph,
            ]);
        }
        $this->call(CandidateTableSeeder::class);
    }
}
