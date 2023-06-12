<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
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
		}

		// $this->call(DummyUserSeeder::class);
	}
}
