<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutSession;

class CreateWorkoutSessionsTable extends Migration
{
	public function up()
	{
		Schema::create('workout_sessions', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(User::class)->onDelete('cascade')->nullable();
			$table->foreignIdFor(Workout::class)->onDelete('cascade')->nullable();
			$table->integer('sets')->nullable();
			$table->integer('reps')->nullable();
			$table->integer('weight')->nullable();
			$table->time('duration')->nullable();
			$table->timestamps();
		});

		Schema::create('workout_session_exercise', function (Blueprint $table) {
			$table->foreignIdFor(WorkoutSession::class)->onDelete('cascade');
			$table->foreignIdFor(Exercise::class)->onDelete('cascade');
			$table->primary(['workout_session_id', 'exercise_id']);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('workout_session_exercise');
		Schema::dropIfExists('workout_sessions');
	}
}
