<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutController;

Route::get('/')->name('home');
Route::redirect('/', '/workouts');

// User routes
Route::get('/workouts', [WorkoutController::class, 'index'])
	->middleware(['auth', 'CheckWorkoutOwner'])
	->name('workouts.index');

Route::get('/workouts/create', [WorkoutController::class, 'create'])
	->middleware('auth')
	->name('workouts.create');

Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])
	->middleware(['auth', 'CheckWorkoutOwner'])
	->name('workouts.show');

Route::post('/workouts', [WorkoutController::class, 'store'])
	->middleware('auth')
	->name('workouts.store');

Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])
	->middleware(['auth', 'CheckWorkoutOwner'])
	->name('workouts.edit');

Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])
	->middleware(['auth', 'CheckWorkoutOwner'])
	->name('workouts.update');

Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])
	->middleware(['auth', 'CheckWorkoutOwner'])
	->name('workouts.destroy');


// Breeze routes
Route::middleware('auth')->group(function () {
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
