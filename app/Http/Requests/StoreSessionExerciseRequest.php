<?php

namespace App\Http\Requests;

use App\Models\ExerciseType;
use Illuminate\Foundation\Http\FormRequest;

class StoreSessionExerciseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'workout_id' => ['required', 'exists:workouts,id'],
            'exercise_type_id' => ['required', 'exists:exercise_types,id'],
        ];

        $exercise = ExerciseType::find($this->exercise_type_id);

        return array_merge($rules, $this->getExerciseRules($exercise));
    }

    private function getExerciseRules(ExerciseType $exercise): array
    {
        $exerciseRules = [];
        $ruleTypes = ['sets', 'reps', 'weights', 'duration'];

        foreach ($ruleTypes as $ruleType) {
            $exerciseRules[$ruleType] = $exercise->is_cardio && $ruleType !== 'duration'
                ? ['nullable']
                : ['required', 'integer'];
        }

        return $exerciseRules;
    }
}
