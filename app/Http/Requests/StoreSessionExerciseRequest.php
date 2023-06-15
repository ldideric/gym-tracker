<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ExerciseType;
use App\Enums\MuscleGroup;

class StoreSessionExerciseRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = [
			'workout_id' => ['required', 'exists:workouts,id'],
			'exercise_type_id' => ['required', 'exists:exercise_types,id'],
		];

		$exercise = ExerciseType::find($this->exercise_id);
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
