<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Workout extends Model
{
	use HasFactory;

	protected $fillable = [
		'exercise_id',
		'user_id',
		'name',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function exercises(): BelongsToMany
	{
		return $this->belongsToMany(Exercise::class, 'workout_exercises', 'workout_id', 'exercise_id');
	}

	public function workoutExercises(): BelongsToMany
	{
		return $this->belongsToMany(WorkoutExercise::class);
	}
}
