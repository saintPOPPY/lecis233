<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Decimal;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // delete all products to ensure new seeding is desired result
        \App\Models\Review::query()->delete();

        // Create a Faker instance to generate spoof data for testing our application
        $faker = \Faker\Factory::create();
        
        // Utilize the Faker instance and Faker methods to generate specified data
        foreach(range(1,60) as $number) {
            \App\Models\Review::create([
                'comment' => $faker->text,
                'rating' => $faker->numberBetween(1,5),
                'user_id' => \App\Models\User::all()->pluck('id')->random()
            ]);
        }
    }
}
