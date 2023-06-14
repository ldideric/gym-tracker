<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\DecimalTrait;
use App\Enums\MuscleGroup;

class Exercise extends Model
{
	use HasFactory, DecimalTrait;

	protected $fillable = [
		'name',
		'muscle_group',
		'description',
		'calories_per_minute',
	];

	public function is_cardio()
	{
		return $this->muscle_group === MuscleGroup::CARDIO;
	}
}
