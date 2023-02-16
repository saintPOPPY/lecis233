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
        // delete all products
            // data is typically pre-manipulated, and we should start from scratch
        // iterate N times to create that many products
        // create a product with random data

        \App\Models\Product::query()->delete();

        // Create a Faker instance to generate spoof data for testing our application
        $faker = \Faker\Factory::create();

        // Utilize the Faker instance and Faker methods to generate specified data
        foreach(range(1,60) as $number) {
            \App\Models\Product::create([
                'name' => $faker->word,
                'price' => $faker->numberBetween(1,100),
                'description' => $faker->sentence(),
                'item_number' => $faker->unique()->numberBetween(1,60),
                'image' => $faker->imageUrl,
            ]);
        }
    }
}
