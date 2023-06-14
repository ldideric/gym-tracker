<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\Session;
use App\Models\SessionExercise;
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

			// Create a session from the workout
			$this->createSession($workout->exercises, $newUser, $workout->id);
			// Create a second session without a workout
			$this->createSession($ExerciseDB->random(rand(5, 8)), $newUser);
		}

		// $this->call(DummyUserSeeder::class);
	}

	private function createSession($exercises, $user, $workoutId = null)
	{
		$session = Session::factory()->create([
			'user_id' => $user->id,
			'workout_id' => $workoutId,
		]);

		foreach ($exercises as $exercise) {
			$params = [
				'exercise_id' => $exercise->id,
				'session_id' => $session->id,
			];
			if ($exercise->is_cardio()) {
				$params['sets'] = null;
				$params['reps'] = null;
				$params['weight'] = null;
			} else {
				$params['duration'] = null;
			}
			SessionExercise::factory()->create($params);
		}
	}
}
