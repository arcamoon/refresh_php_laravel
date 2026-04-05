<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Facker;

use function Symfony\Component\Clock\now;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Facker::create();

        $categoryIds = DB::table("category")->pluck('id')->toArray();

        if (empty($categoryIds)) {
            $this->command->warn("No hay categorías en la tabla category");
            return ;
        }
        $products = [];

        for ($i = 1; $i < 50; $i++) {
            $products[] = [
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 500),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('product')->insert($products);
    }
}
