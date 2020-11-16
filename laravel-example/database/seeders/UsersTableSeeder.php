<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'company' => $faker->company,
            'country' => $faker->country,
            'email' => $faker->email,
            'password' => $faker->password
        ]);
    }
}
