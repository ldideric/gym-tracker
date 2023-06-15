<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Session;
// use App\Http\Requests\StoreSessionExerciseRequest as Request;

class SessionController extends Controller
{
	public function index():View
	{
		return view('sessions.index');
	}

	public function show(Session $session):View
	{
		return view('sessions.show', [
			'session' => $session,
		]);
	}
}
