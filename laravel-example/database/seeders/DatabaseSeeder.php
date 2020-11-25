<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Jovan",
            'password' => Hash::make("12121212"),
            'email' => "name@gmail.com"
        ]);

        DB::table('users')->insert([
            'name' => "Pera",
            'password' => Hash::make("123123123"),
            'email' => "pera@gmail.com"
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->text(40),
                'content' => $faker->sentence(10),
                'user_id' => $faker->numberBetween(1, 2)
            ]);
        }
    }
}
