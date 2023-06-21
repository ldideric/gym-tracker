<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\DecimalTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
	use HasFactory, DecimalTrait;

	protected $fillable = [
		'session_id',
		'exercise_type_id',
		'sets',
		'reps',
		'weight',
		'duration',
	];

	public function session(): BelongsTo
	{
		return $this->belongsTo(Session::class);
	}

	public function exerciseType(): BelongsTo
	{
		return $this->belongsTo(ExerciseType::class);
	}
}
