<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $categoryDiscount = [0, 10, 15, 35, 50];
        $keyDiscount = array_rand($categoryDiscount);
        $category = Category::all()->random();
        return [
            'category_id' => $category->id,
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(1500, 6000),
            'discount' => $categoryDiscount[$keyDiscount]
        ];
    }
}
