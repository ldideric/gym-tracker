<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Workout;
use App\Models\Exercise;

class DummyUserSeeder extends Seeder
{
	public function run(): void
	{
		User::factory(10)->create()->each(function ($user) {
		Workout::factory(3)->create([
			'user_id' => $user->id,
		])->each(function ($workout) {
			$exercises = Exercise::inRandomOrder()->limit(rand(5, 8))->get();
			$workout->exercises()->attach($exercises);
		});
	});
	}
}
