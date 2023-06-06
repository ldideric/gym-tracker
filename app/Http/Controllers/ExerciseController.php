<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->input('search');

		$exercises = Exercise::where('name', 'like', "%$search%")
			->get();

		return response()->json($exercises);
	}
}
