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
    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');

    // User owner of workout
    Route::middleware(['CheckWorkoutOwner'])->group(function () {
        // Workout routes
        Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');
        Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
        Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])->name('workouts.update');
        Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
    });

    // Session routes
    Route::get('/sessions/', [SessionController::class, 'index'])->name('sessions.index');
    Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');

    // User owner of session
    Route::middleware(['CheckSessionOwner'])->group(function () {
        // Session routes
        Route::get('/sessions/{session}', [SessionController::class, 'show'])->name('sessions.show');
        Route::get('/sessions/{session}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
        Route::put('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');
        Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');
    });

    // Breeze routes
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
