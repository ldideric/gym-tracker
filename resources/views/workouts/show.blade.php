@extends('layouts.home')

@section('title', $workout->name)

@section('content')

	<div class="container flex items-center mx-auto mt-5">
		<x-home.left-button :url="route('workouts.index')">back</x-home.left-button>
		<delete-exercise-component :url="'{{ route('workouts.destroy', $workout) }}'"></delete-exercise-component>
		<x-home.right-button :url="route('workouts.edit', $workout)">edit</x-home.right-button>
	</div>

	<div class="container mx-auto my-5 p-6 bg-white rounded-lg shadow-md text-gray-700">
		<h1 class="text-3xl font-bold mb-4">{{ $workout->name }}</h1>
		
		<h2 class="text-2xl font-bold mb-2">Exercises:</h2>
		<ul class="list-disc list-inside">
			@foreach ($workout->exercises as $exercise)
				<li>{{ $exercise->name }}</li>
			@endforeach
		</ul>
	</div>

@endsection
