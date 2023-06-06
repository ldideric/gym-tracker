@extends('layouts.home')

@section('title', $workout->name)

@section('content')
	<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-gray-700">
		<h1 class="text-4xl font-bold mb-4">{{ $workout->name }}</h1>
		
		<h2 class="text-2xl font-bold mb-2">Exercises:</h2>
		<ul class="list-disc list-inside">
			@foreach ($workout->exercises as $exercise)
				<li>{{ $exercise->name }}</li>
			@endforeach
		</ul>

		<x-home.link-button :url="route('workouts.index')">Back to Overview</x-home.link-button>
	</div>
@endsection
