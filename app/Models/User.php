<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	public function workouts(): HasMany
	{
		return $this->hasMany(Workout::class);
	}

	public function exercises()
	{
		return $this->workouts()->exercises();
	}

	public function workoutSessions(): HasMany
	{
		return $this->hasMany(WorkoutSession::class);
	}
}
