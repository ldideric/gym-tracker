<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\View\View;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

// use App\Http\Requests\StoreSessionExerciseRequest as Request;

class SessionController extends Controller
{
	public function index(): View
	{
		$sessions = Auth::user()->sessions->load('exercises.exerciseType');

		$exercises = $sessions->flatMap(function ($session) {
			return $session->exercises;
		});
	
		$groupedByMuscleGroup = $exercises->groupBy(function ($exercise) {
			return $exercise->exerciseType->muscle_group;
		});
	
		$groupedExercises = $groupedByMuscleGroup->map(function ($exercises, $muscleGroup) {
			return $exercises->groupBy(function ($exercise) {
				return $exercise->exerciseType->name;
			});
		});

		// dd($groupedExercises);

		return view('sessions.index', [
			'exercises' => $groupedExercises,
		]);
	}

	public function show(Session $session): View
	{
		return view('sessions.show', [
			'session' => $session,
		]);
	}
}
