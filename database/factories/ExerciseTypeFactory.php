<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\MuscleGroup;

class ExerciseTypeFactory extends Factory
{
	public function definition(): array
	{
		return [
			'name' => $this->faker->word,
			'muscle_group' => $this->faker->randomElement(MuscleGroup::getValues()),
			'description' => $this->faker->paragraph,
			'calories_per_minute' => $this->faker->randomFloat(1, 1, 10),
		];
	}
}
