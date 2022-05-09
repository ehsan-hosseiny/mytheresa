<?php

namespace Database\Seeders;

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
        $categories = ['boots','sandals','sneakers'];
        foreach ($categories as $category) {
            $categoryDiscount = [30, 0];
            $keyDiscount = array_rand($categoryDiscount);
            \App\Models\Category::create([
                'title' => $category,
                'discount' => $categoryDiscount[$keyDiscount]
            ]);
        }
         \App\Models\Product::factory(20)->create();
    }
}
