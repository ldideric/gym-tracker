<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ProfileController;

Route::get('/')->name('home');
Route::redirect('/', '/workouts');

Route::middleware(['auth'])->group(function () {
	// Workout routes
	Route::get('/workouts', [WorkoutController::class, 'index'])					->name('workouts.index');
	Route::get('/workouts/create', [WorkoutController::class, 'create'])			->name('workouts.create');
	Route::post('/workouts', [WorkoutController::class, 'store'])					->name('workouts.store');

	// Workout routes w/ WorkoutOwner middleware
	Route::middleware(['CheckWorkoutOwner'])->group(function () {
		Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])		->name('workouts.show');
		Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])	->name('workouts.edit');
		Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])		->name('workouts.update');
		Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])	->name('workouts.destroy');
	});

	// Breeze routes
	Route::get('/dashboard', [ProfileController::class, 'index'])					->name('profile.index');
	Route::get('/profile', [ProfileController::class, 'edit'])						->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])					->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])				->name('profile.destroy');
});

require __DIR__.'/auth.php';
