<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckWorkoutOwner
{
	public function handle(Request $request, Closure $next): Response
	{
		$workout = $request->route('workout');

		if (!$workout) {
			return $next($request);
		}

		if (Auth::check() && Auth::user()->id === $workout->user_id) {
			return $next($request);
		}

		return abort(403);
	}
}
