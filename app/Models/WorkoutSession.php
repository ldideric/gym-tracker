<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Traits\DecimalTrait;

class WorkoutSession extends Model
{
	use HasFactory, DecimalTrait;

	protected $fillable = [
		'user_id',
		'workout_id',
		'sets',
		'reps',
		'weight',
		'duration',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function workout(): BelongsTo
	{
		return $this->belongsTo(Workout::class);
	}

	public function exercises(): BelongsToMany
	{
		return $this->belongsToMany(Exercise::class, 'workout_session_exercise');
	}
}
