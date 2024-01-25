<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\Session;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $ExerciseDB = ExerciseType::all();

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

            $workout->exerciseTypes()->attach($ExerciseDB->random(rand(5, 8)));

            // Create a session from the workout
            $this->createSession($workout->exerciseTypes, $newUser, $workout->id);
            // Create a second session without a workout
            $this->createSession($ExerciseDB->random(rand(5, 8)), $newUser);
        }

        $this->call(DummyUserSeeder::class);
    }

    static function createSession(Collection $exercises, $user, $workoutId = null): void
    {
        $session = Session::factory()->create([
            'user_id' => $user->id,
            'workout_id' => $workoutId,
        ]);

        /** @var ExerciseType $exercise */
        foreach ($exercises as $exercise) {
            $params = [
                'exercise_type_id' => $exercise->id,
                'session_id' => $session->id,
            ];
            if ($exercise->is_cardio) {
                $params['sets'] = 0;
                $params['reps'] = 0;
                $params['weight'] = 0;
            } else {
                $params['duration'] = 0;
            }
            Exercise::factory()->create($params);
        }
    }
}
