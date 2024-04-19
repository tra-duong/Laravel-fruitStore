<?php

namespace Database\Factories;

use App\Models\Fruit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fruit>
 */
class FruitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Fruit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'slug' => fake()->slug(),
            'price' => fake()->randomFloat(2, 1, 100),
            'unit' => fake()->randomElement(['pcs', 'pack', 'kg']),
            'stock' => fake()->numberBetween(1, 10000),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
