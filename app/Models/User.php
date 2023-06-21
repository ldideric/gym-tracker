<?php

namespace App\Models;

use Attribute;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

	public function sessions(): HasMany
	{
		return $this->hasMany(Session::class);
	}

	public function exercises(): HasManyThrough
	{
		return $this->hasManyThrough(
			Exercise::class,
			Session::class,
			'user_id',
			'session_id',
			'id',
			'id'
		);
	}
}
