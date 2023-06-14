<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;

Route::get('/')->name('home');
Route::redirect('/', '/workouts');

// User logged in
Route::middleware(['auth'])->group(function () {
	// Workout routes
	Route::get('/workouts', [WorkoutController::class, 'index'])					->name('workouts.index');
	Route::get('/workouts/create', [WorkoutController::class, 'create'])			->name('workouts.create');
	Route::post('/workouts', [WorkoutController::class, 'store'])					->name('workouts.store');

	// User owner of workout
	Route::middleware(['CheckWorkoutOwner'])->group(function () {
		// Workout routes
		Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])		->name('workouts.show');
		Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])	->name('workouts.edit');
		Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])		->name('workouts.update');
		Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])	->name('workouts.destroy');
	});

	// Session routes
	Route::get('/session/', [SessionController::class, 'index'])					->name('session.index');
	Route::get('/session/create', [SessionController::class, 'create'])				->name('session.create');
	Route::post('/session', [SessionController::class, 'store'])					->name('session.store');

	// User owner of session
	Route::middleware(['CheckSessionOwner'])->group(function () {
		// Session routes
		Route::get('/session/{session}', [SessionController::class, 'show'])		->name('session.show');
		Route::get('/session/{session}/edit', [SessionController::class, 'edit'])	->name('session.edit');
		Route::put('/session/{session}', [SessionController::class, 'update'])		->name('session.update');
		Route::delete('/session/{session}', [SessionController::class, 'destroy'])	->name('session.destroy');
	});

	// Breeze routes
	Route::get('/dashboard', [ProfileController::class, 'dashboard'])				->name('dashboard');
	Route::get('/profile', [ProfileController::class, 'edit'])						->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])					->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])				->name('profile.destroy');
});

require __DIR__.'/auth.php';
