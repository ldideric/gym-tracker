<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Exercise;
use App\Enums\MuscleGroup;

class StoreWorkoutSessionRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = [
			'user_id' => ['required', 'exists:users,id'],
			'workout_id' => ['required', 'exists:workouts,id'],
			'exercise_id' => ['required', 'exists:exercises,id'],
		];

		$exercise = Exercise::find($this->exercise_id);
		if ($exercise->muscle_group->equals(MuscleGroup::CARDIO)) {
			$rules['sets'] = ['nullable'];
			$rules['reps'] = ['nullable'];
			$rules['weights'] = ['nullable'];
			$rules['duration'] = ['required', 'integer'];
		} else {
			$rules['sets'] = ['required', 'integer'];
			$rules['reps'] = ['required', 'integer'];
			$rules['weights'] = ['required', 'integer'];
			$rules['duration'] = ['nullable'];
		}

		return $rules;
	}
}
