<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		$this->call(ExerciseSeeder::class);

		User::factory()->create([
			'name' => 'Lietze',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
		])->each(function ($user) {
			Workout::factory(3)->create([
				'user_id' => $user->id,
			])->each(function ($workout) {
				$exercises = Exercise::inRandomOrder()->limit(rand(5, 8))->get();
				$workout->exercises()->attach($exercises);
			});
		});

		$this->call(DummyUserSeeder::class);
	}
}
