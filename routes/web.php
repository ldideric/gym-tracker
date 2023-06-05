<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

	Route::redirect('/', '/workouts');

	// User routes
	Route::middleware(['CheckWorkoutOwner'])->group(function () {
		Route::get('/workouts', [UserController::class, 'index'])->name('workouts.index');
		Route::get('/workouts/{workout}', [UserController::class, 'show'])->name('workouts.show');
	});


	// Breeze routes
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
