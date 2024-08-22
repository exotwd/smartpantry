<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produce>
 */
class ProduceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'category_id' => null,
            'price' => $this->faker->numberBetween(1, 100),
            'unit' => $this->faker->randomElement(['kg', 'g', 'lb', 'oz']),
            'stock' => $this->faker->numberBetween(1, 100),
            'expires_in_days' => $this->faker->numberBetween(1, 30),
        ];
    }
}
