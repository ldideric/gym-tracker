<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Traits\CalorieTrait;

class Exercise extends Model
{
	use HasFactory, CalorieTrait;

	protected $fillable = [
		'name',
		'muscle_group',
		'description',
		'calories_per_minute',
	];
}
