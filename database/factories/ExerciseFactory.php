<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
	public function definition(): array
	{
		$startTime = now()->addMinutes(10);
		$endTime = now()->addMinutes(60);
		$duration = $this->faker->dateTimeBetween($startTime, $endTime)->diff($startTime)->format('%H:%I:%S');

		return [
			'sets' => $this->faker->numberBetween(1, 3),
			'reps' => $this->faker->randomElement([1, 2, 4, 6, 8, 10, 12]),
			'weight' => $this->faker->numberBetween(15, 50) * 2.5,
			'duration' => $duration,
		];
	}
}