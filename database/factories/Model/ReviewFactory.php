<?php

namespace Database\Factories\Model;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'review' => fake()->paragraph(),
            'star' => fake()->numberBetween(0,5),
            'product_id' => function(){
                return Product::all()->random();
            }   
        ];
    }    
}
