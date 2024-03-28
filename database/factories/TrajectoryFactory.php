<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trajectory>
 */
class TrajectoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'image' => fake()->file(),
            'user_id' => 1,
            'category_id'=>1 ,
        ];
    }
}
