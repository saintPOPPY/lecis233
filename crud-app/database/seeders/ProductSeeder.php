<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Decimal;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // delete all products to ensure new seeding is desired result
        \App\Models\Product::query()->delete();

        // Create a Faker instance to generate spoof data for testing our application
        $faker = \Faker\Factory::create();
        
        // iterate `N` times to create `N` many products
        // Utilize the Faker instance and Faker methods to generate specified data
        foreach(range(1,60) as $number) {
            \App\Models\Product::create([
                'name' => $faker->word,
                'price' => $faker->randomFloat(2,0,1000),
                'description' => $faker->sentence(),
                'item_number' => $faker->unique()->numberBetween(1,60),
                'image' => $faker->imageUrl,
            ]);
        }
    }
}
