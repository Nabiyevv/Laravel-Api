<?php

namespace Database\Factories\Model;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model\Product>
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
        return [
            'name' => fake()->name(),
            'detail' => fake()->paragraph(),
            'price' => fake()->numberBetween(10,155),
            'stock' => fake()->numberBetween(20,200),
            'discount' => fake()->numberBetween(2,30),            
        ];
    }
}
