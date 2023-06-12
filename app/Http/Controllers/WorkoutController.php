<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Exercise;
use App\Models\Workout;

class WorkoutController extends Controller
{
	public function index(): View
	{
		return view('workouts.index');
	}

	public function show(Workout $workout): View
	{
		return view('workouts.show', [
			'workout' => $workout,
		]);
	}

	public function create(): View
	{
		return view('workouts.create');
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
			'workout' => $workout,
		]);
	}

	public function destroy(Workout $workout): View
	{
		$workout->delete();

		return view('workouts.index');
	}

	public function edit(Workout $workout): View
	{
		return view('workouts.edit', [
			'workout' => $workout,
		]);
	}

	public function update(Workout $workout): View
	{
		$this->validate(request(), [
			'name' => 'required|string|max:255',
			'selectedExercises' => 'required|array',
		]);

		$workout->update([
			'name' => request('name'),
		]);

		$workout->exercises()->sync(request('selectedExercises'));

		return view('workouts.show', [
			'workout' => $workout,
		]);
	}
}
