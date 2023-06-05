<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('workouts', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->foreignIdFor(User::class)->onDelete('cascade')->nullable();
			$table->timestamps();
		});

		Schema::create('workout_exercises', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Workout::class)->onDelete('cascade')->nullable();
			$table->foreignIdFor(Exercise::class)->onDelete('cascade')->nullable();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('workout_exercises');
		Schema::dropIfExists('workouts');
	}
};
