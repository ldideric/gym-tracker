<?php

use App\Models\ExerciseType;
use App\Models\Session;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Session::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(ExerciseType::class)->constrained()->onDelete('cascade');
            $table->integer('sets')->nullable();
            $table->integer('reps')->nullable();
            $table->integer('weight')->nullable();
            $table->time('duration')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
}
