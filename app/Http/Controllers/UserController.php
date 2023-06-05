<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Workout;

class UserController extends Controller
{
	public function index(): View
	{
		return view('user.index', [
			'user' => auth()->user(),
		]);
	}

	public function show(Workout $workout): View
	{
		return view('user.show', [
			'user' => auth()->user(),
			'workout' => $workout,
		]);
	}
}
