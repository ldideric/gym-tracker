@extends('layouts.home')

@section('title', $workout->name)

@section('content')

	<div class="container w-[90vw] flex items-center justify-between mx-auto mt-5">
		<x-home.blue-button :url="route('workouts.index')"><x-svg.left-arrow/></x-home.blue-button>
		<x-home.orange-button :url="route('workouts.edit', $workout)"><x-svg.edit/></x-home.orange-button>
		<delete-exercise-component :url="'{{ route('workouts.destroy', $workout) }}'"></delete-exercise-component>
	</div>

	<div class="container w-auto mx-5 my-5 p-6 bg-white rounded-lg shadow-md text-gray-700">
		<h1 class="text-3xl font-bold mb-4">{{ $workout->name }}</h1>
		
		<h2 class="text-2xl font-bold mb-2">Exercises:</h2>
		<ul class="list-disc list-inside">
			@foreach ($workout->exerciseTypes as $exercise)
				<li>{{ $exercise->name }}</li>
			@endforeach
		</ul>
	</div>

@endsection
