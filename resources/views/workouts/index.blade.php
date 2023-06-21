@extends('layouts.home')

@section('title', 'Workouts')

@section('content')

	<div class="container w-auto p-6 text-white">
		<h1 class="text-4xl text-rose-600 font-bold mb-4"><i class="fas fa-dumbbell"></i> Workouts</h1>
		<p class="mb-2 text-lg font-bold">Good morning, {{ auth()->user()->name }}!</p>
		<p class="mb-4">Here you can view and manage your current <span class="font-bold text-rose-600">workout</span> plans, as well as create new ones to keep pushing your fitness goals.</p>
		<p>Start your fitness journey <span class="font-bold text-rose-600">today</span> and take the first step towards a healthier lifestyle!</p>
	</div>

	<div class="w-full border-t-3 border-rose-600"></div>

	<div class="mb-44">
		@forelse (auth()->user()->workouts as $workout)
			<div class="container w-auto mx-5 my-5 p-4 text-white bg-slate-900 rounded-lg">
				<div class="flex justify-between items-center">
					<p class="text-lg font-bold">{{ $workout->name }}</p>
					<x-home.rose-button :url="route('workouts.show', $workout)">View</x-home.rose-button>
				</div>
			</div>
		@empty
			<div class="container w-auto m-5 mt-8 text-center">
				<p class="mb-8 font-bold text-lg text-white underline decoration-rose-600 decoration-2">You don't have any workouts yet!</p>
				<x-home.rose-button :url="route('workouts.create')" class="mx-auto">Create one here!</x-home.rose-button>
			</div>
		@endforelse
	</div>

	@if (auth()->user()->workouts->count())
		<div class="sticky bottom-0">
			<div class="absolute right-6 bottom-28">
				<a href="{{ route('workouts.create') }}" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
					<x-svg.plus/>
				</a>
			</div>
		</div>
	@endif

@endsection
