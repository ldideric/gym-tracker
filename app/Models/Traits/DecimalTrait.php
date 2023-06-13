<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait DecimalTrait
{
	protected function caloriesPerMinute(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value / 100,
			set: fn ($value) => $value * 100
		);
	}

	protected function weight(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value / 100,
			set: fn ($value) => $value * 100
		);
	}
}
