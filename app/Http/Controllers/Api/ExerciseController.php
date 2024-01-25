<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExerciseType;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $exclude = $request->input('exclude');

        $exercises = ExerciseType::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($exclude, function ($query, $exclude) {
                $query->whereNotIn('id', $exclude);
            })
            ->limit(10)
            ->get();

        return response()->json($exercises);
    }
}
