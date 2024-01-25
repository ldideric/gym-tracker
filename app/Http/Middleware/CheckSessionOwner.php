<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $session = $request->route('session');

        if (! $session) {
            return $next($request);
        }

        if (auth()->check() && auth()->user()->id === $session->user_id) {
            return $next($request);
        }

        abort(403);
    }
}
