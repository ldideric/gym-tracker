<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ExerciseType;
use App\Models\Session;

class CreateExercisesTable extends Migration
{
	public function up()
	{
		Schema::create('exercises', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Session::class)->onDelete('cascade');
			$table->foreignIdFor(ExerciseType::class)->onDelete('cascade');
			$table->integer('sets')->nullable();
			$table->integer('reps')->nullable();
			$table->integer('weight')->nullable();
			$table->time('duration')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('exercises');
	}
}
