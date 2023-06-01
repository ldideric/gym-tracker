<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
	public function run(): void
	{
		$json = file_get_contents(storage_path('app/exercises.json'));
		$muscleGroups = json_decode($json, true);

		foreach ($muscleGroups as $muscleGroup) {
			foreach ($muscleGroup['exercises'] as $exercise) {
				Exercise::factory()->create([
					'name' => $exercise['exerciseName'],
					'muscle_group' => $muscleGroup['groupName'],
					'description' => $exercise['description'],
					'calories_per_minute' => $exercise['caloriesBurnedPerMinute'],
				]);
			}
		}
	}
}
