@extends('layouts.home')

@section('title', 'Overview')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-gray-700">

	<h1 class="text-4xl font-bold mb-4">{{ str_replace('_', ' ', config('app.name')) }}</h1>
	<p class="mb-2">Welcome to Lietze's {{ str_replace('_', ' ', config('app.name')) }}!</p>
	<p class="mb-4">Here you can find your overview and all your workouts!</p>
	
	<p class="text-lg font-bold">You are logged in as {{ $user->name }}.</p>

	@forelse ($user->workouts as $workout)
		<div class="my-6 p-4 bg-blue-100 rounded-lg">
			<div class="flex justify-between items-center">
				<p class="text-lg font-bold">{{ $workout->name }}</p>
				<x-home.link-button :url="route('workouts.show', $workout)">View Workout</x-home.link-button>
			</div>
		</div>
	@empty
		<p class="text-red-500 text-lg my-6 font-bold">You have no workouts yet!</p>
	@endforelse


	<x-home.link-button :url="route('workouts.create')">Create Workout</x-home.link-button>

</div>

@endsection
