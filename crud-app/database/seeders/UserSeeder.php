<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Decimal;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // delete all products to ensure new seeding is desired result
        \App\Models\User::query()->delete();

        // Create a Faker instance to generate spoof data for testing our application
        $faker = \Faker\Factory::create();
        
        // Utilize the Faker instance and Faker methods to generate specified data
        foreach(range(1,10) as $number) {
            \App\Models\User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
