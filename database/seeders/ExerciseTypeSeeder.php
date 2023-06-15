<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ExerciseType;

class ExerciseTypeSeeder extends Seeder
{
	public function run(): void
	{
		$json = file_get_contents(storage_path('app/exercise_types.json'));
		$muscleGroups = json_decode($json, true);

		foreach ($muscleGroups as $muscleGroup) {
			foreach ($muscleGroup['exercises'] as $exercise) {
				ExerciseType::factory()->create([
					'name' => $exercise['exerciseName'],
					'muscle_group' => $muscleGroup['groupName'],
					'description' => $exercise['description'],
					'calories_per_minute' => $exercise['caloriesBurnedPerMinute'],
				]);
			}
		}
	}
}
