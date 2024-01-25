<?php

namespace Database\Seeders;

use App\Models\ExerciseType;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    public function run(): void
    {
        $ExerciseDB = ExerciseType::all();

        User::factory(10)->create()->each(function ($user) use ($ExerciseDB) {
            $workouts = Workout::factory(3)->create(['user_id' => $user->id]);

            $workouts->each(function ($workout) use ($user, $ExerciseDB) {
                $workout->exerciseTypes()->attach($ExerciseDB->random(rand(5, 8)));
                // Create a session from the workout
                UserSeeder::createSession($workout->exerciseTypes, $user, $workout->id);
                // Create a second session without a workout
                UserSeeder::createSession($ExerciseDB->random(rand(5, 8)), $user);
            });
        });
    }
}
