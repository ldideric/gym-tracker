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

	public function exercises(): BelongsToMany
	{
		return $this->belongsToMany(Exercise::class, 'workout_exercises');
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
