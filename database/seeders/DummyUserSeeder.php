<?php

namespace Database\Seeders;

use App\Enums\MuscleGroup;
use App\Models\User;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\Session;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
	public function run()
	{
		User::factory(10)->create()->each(function ($user) {
			$workouts = Workout::factory(3)->create(['user_id' => $user->id]);

			$workouts->each(function ($workout) use ($user) {
				$exercises = Exercise::inRandomOrder()->limit(rand(5, 8))->get();
				$workout->exercises()->attach($exercises);

				$this->createWorkoutSessions($exercises, $workout, $user);
			});
		});
	}

	protected function createWorkoutSessions($exercises, $workout, $user)
	{
		$exercises->each(function ($exercise) use ($workout, $user) {
			$workoutSessionData = [
				'user_id' => $user->id,
				'workout_id' => $workout->id,
			];

			if ($exercise->is_cardio()) {
				$workoutSessionData['sets'] = null;
				$workoutSessionData['reps'] = null;
				$workoutSessionData['weight'] = null;
			} else {
				$workoutSessionData['duration'] = null;
			}

			$workoutSession = Session::factory()->create($workoutSessionData);
			$workoutSession->exercises()->attach($exercise->id);
		});
	}
}
