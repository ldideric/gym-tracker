<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Exercise;
use App\Models\Workout;

class WorkoutController extends Controller
{
	public function index(): View
	{
		return view('workouts.index', [
			'user' => auth()->user(),
		]);
	}

	public function show(Workout $workout): View
	{
		return view('workouts.show', [
			'user' => auth()->user(),
			'workout' => $workout,
		]);
	}

	public function create(): View
	{
		return view('workouts.create', [
			'user' => auth()->user(),
		]);
	}

	public function store(): View
	{
		$this->validate(request(), [
			'name' => 'required|string|max:255',
			'selectedExercises' => 'required|array',
		]);

		$workout = Workout::Factory()
			->hasAttached(Exercise::find(request('selectedExercises')))
			->create([
				'user_id' => auth()->user()->id,
				'name' => request('name'),
			]);

		return view('workouts.show', [
			'user' => auth()->user(),
			'workout' => $workout,
		]);
	}
}
