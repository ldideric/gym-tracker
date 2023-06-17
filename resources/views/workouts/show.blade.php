@extends('layouts.home')

@section('title', $workout->name)

@section('content')

	<div class="container w-auto m-5 text-white">
		<h1 class="text-4xl text-rose-600 font-bold">{{ $workout->name }}</h1>
	</div>

	<div class="mb-44">
		<dropdown-details-component :exercises="{{ $workout->exerciseTypes }}"></dropdown-details-component>
	</div>

	<div class="sticky bottom-0">
		<delete-exercise-component :deleteUrl="'{{ route('workouts.destroy', $workout) }}'" :editUrl="'{{ route('workouts.edit', $workout) }}'"></delete-exercise-component>
		<div class="absolute right-6 bottom-28 flex">
			<a href="{{ route('workouts.edit', $workout) }}" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full mr-4">
				<x-svg.edit/>
			</a>
			<a href="{{ route('workouts.create') }}" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-24 h-12 rounded-full">
				<span class="font-bold">START</span>
			</a>
		</div>
	</div>

@endsection
