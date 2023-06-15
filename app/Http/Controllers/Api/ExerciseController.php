<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->input('search');

		$exercises = Exercise::where('name', 'like', "%$search%")
			->limit(10)
			->get();

		return response()->json($exercises);
	}
}
