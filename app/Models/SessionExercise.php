<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\DecimalTrait;

class SessionExercise extends Model
{
	use HasFactory, DecimalTrait;

	protected $fillable = [
		'session_id',
		'exercise_id',
		'sets',
		'reps',
		'weight',
		'duration',
	];

	public function session()
	{
		return $this->belongsTo(Session::class);
	}

	public function exercise()
	{
		return $this->belongsTo(Exercise::class);
	}
}
