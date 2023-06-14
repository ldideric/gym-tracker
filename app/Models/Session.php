<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Session extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'workout_id',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function workout(): BelongsTo
	{
		return $this->belongsTo(Workout::class);
	}

	public function sessionExercises(): BelongsToMany
	{
		return $this->belongsToMany(Exercise::class, 'session_exercises', 'session_id', 'exercise_id')
			->withPivot(['sets', 'reps', 'weight', 'duration']);
	}
}
