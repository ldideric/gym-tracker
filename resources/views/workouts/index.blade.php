@extends('layouts.home')

@section('title', 'Overview')

@section('content')

	<div class="container flex items-center mx-auto mt-5">
		<x-home.left-button :url="url()->previous()">previous page</x-home.left-button>
		<x-home.plus-button :url="route('workouts.create')">new workout</x-home.plus-button>
	</div>

	<div class="container w-auto mx-5 my-5 p-6 bg-white rounded-lg shadow-md text-gray-700">

		<h1 class="text-4xl font-bold mb-4">{{ str_replace('_', ' ', config('app.name')) }}</h1>
		<p class="mb-2">Welcome to Lietze's {{ str_replace('_', ' ', config('app.name')) }}!</p>
		<p class="mb-4">Here you can find your overview and all your workouts!</p>
		
		<p class="text-lg font-bold">You are logged in as {{ auth()->user()->name }}.</p>

		@forelse (auth()->user()->workouts as $workout)
			<div class="my-6 p-4 bg-blue-100 rounded-lg">
				<div class="flex justify-between items-center">
					<p class="text-lg font-bold">{{ $workout->name }}</p>
					<x-home.right-button :url="route('workouts.show', $workout)">View Workout</x-home.right-button>
				</div>
			</div>
		@empty
			<p class="text-red-500 text-lg my-6 font-bold">You have no workouts yet!</p>
		@endforelse

	</div>

@endsection
