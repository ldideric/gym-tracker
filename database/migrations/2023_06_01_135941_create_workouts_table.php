<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\ExerciseType;
use App\Models\Workout;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('workouts', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->foreignIdFor(User::class)->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('workout_exercises', function (Blueprint $table) {
			$table->foreignIdFor(Workout::class)->onDelete('cascade');
			$table->foreignIdFor(ExerciseType::class)->onDelete('cascade');
			$table->primary(['workout_id', 'exercise_type_id']);
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('workout_exercises');
		Schema::dropIfExists('workouts');
	}
};
