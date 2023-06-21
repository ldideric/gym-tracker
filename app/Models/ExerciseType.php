<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\DecimalTrait;
use App\Enums\MuscleGroup;

class ExerciseType extends Model
{
	use HasFactory, DecimalTrait;

	protected $fillable = [
		'name',
		'muscle_group',
		'description',
		'calories_per_minute',
	];

	public function is_cardio(): bool
	{
		return $this->muscle_group === MuscleGroup::CARDIO;
	}

	public function exercises(): HasMany
	{
		return $this->hasMany(Exercise::class);
	}
}
