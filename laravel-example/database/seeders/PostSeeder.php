<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->text(40),
                'content' => $faker->sentence(10),
                'user_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
