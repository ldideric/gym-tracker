<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('workouts', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('workout_exercises', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('workout_id');
			$table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
			$table->unsignedBigInteger('exercise_id');
			$table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('workout_exercises');
		Schema::dropIfExists('workouts');
	}
};
