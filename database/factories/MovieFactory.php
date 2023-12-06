<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,10),
            'name' => fake(),
            'age_restriction' => fake()->numberBetween(0,18),
            'length_in_minutes' =>fake()->numberBetween(1,190),
            'file' => fake()->words(),
            'file_size' => fake()->numberBetween(1,400),
        ];
    }
}
