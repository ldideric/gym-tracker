<?php

namespace Database\Factories;

use App\Enums\MuscleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'muscle_group' => $this->faker->randomElement(MuscleGroup::cases()),
            'description' => $this->faker->paragraph,
            'calories_per_minute' => $this->faker->randomFloat(1, 1, 10),
        ];
    }
}
