<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutSession;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		$ExerciseDB = Exercise::all();

		$json = file_get_contents(storage_path('app/users.json'));
		$users = json_decode($json, true);

		foreach ($users as $user) {
			$newUser = User::factory()->create([
				'name' => $user['name'],
				'email' => $user['email'],
				'password' => bcrypt($user['password']),
			]);

			$workout = Workout::factory()->create([
				'name' => 'My First Workout',
				'user_id' => $newUser->id,
			]);

			$workout->exercises()->attach($ExerciseDB->random(rand(5, 8)));

			$workout->exercises->each(function ($exercise) use ($workout, $newUser) {
				$workoutSessionData = [
					'user_id' => $newUser->id,
					'workout_id' => $workout->id,
				];

				if ($exercise->is_cardio()) {
					$workoutSessionData['sets'] = null;
					$workoutSessionData['reps'] = null;
					$workoutSessionData['weight'] = null;
				} else {
					$workoutSessionData['duration'] = null;
				}

				$workoutSession = WorkoutSession::factory()->create($workoutSessionData);
				$workoutSession->exercises()->attach($exercise->id);
			});
		}

		$this->call(DummyUserSeeder::class);
	}
}
