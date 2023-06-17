@extends('layouts.home')

@section('title', 'Create Workout')

@section('content')

	<div class="container w-auto m-5 text-white">
		<h1 class="text-4xl text-rose-600 font-bold">Edit Workout</h1>
	</div>

	<div class="mb-44">
		<div class="container w-auto m-5 p-4 text-white bg-slate-900 rounded-lg">
			<form action="{{ route('workouts.update', $workout) }}" method="POST">
				@method('PUT')
				@csrf

				<div class="mb-4">
					<label for="name" class="text-rose-600 text-sm font-bold mb-2">Workout Name</label>
					<input type="text" name="name" id="name" placeholder="Workout Name" class=" appearance-none rounded w-full py-2 px-3 text-white bg-slate-700 leading-tight" value="{{ $workout->name }}">
					@if ($errors->has('name'))
						<div class="text-red-500 mt-2 text-sm">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<exercise-search-component :init-selected-exercises="{{ $workout->exerciseTypes }}"></exercise-search-component>

				@if ($errors->has('selectedExercises'))
					<div class="text-red-500 mt-2 text-sm">{{ $errors->first('selectedExercises') }}</div>
				@endif

				<x-home.rose-button :url="route('workouts.show', $workout)">
					Back
				</x-home.rose-button>

				<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update Workout</button>

			</form>
		</div>
	</div>

@endsection