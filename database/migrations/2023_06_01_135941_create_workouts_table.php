<?php

use App\Models\ExerciseType;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->foreignIdFor(Workout::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(ExerciseType::class)->constrained()->onDelete('cascade');
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
