<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
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
            'user_id' => null,
            'prep_time' => $this->faker->numberBetween(1, 60),
            'cook_time' => $this->faker->numberBetween(1, 60),
            'servings' => $this->faker->numberBetween(1, 10),
            'instructions' => $this->faker->text(),
            'calories' => $this->faker->numberBetween(100, 1000),

        ];
    }
}
