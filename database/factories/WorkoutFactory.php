<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Workout ' . $this->faker->unique()->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
