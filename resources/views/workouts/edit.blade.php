@extends('layouts.home')

@section('title', 'Edit Workout')

@section('content')

	<div class="container w-auto m-5 text-white">
		<h1 class="text-4xl text-rose-600 font-bold">Edit Workout</h1>
	</div>

	<form action="{{ route('workouts.update', $workout) }}" method="POST">
	@method('PUT')
	@csrf

		<div class="mb-44">
			<div class="container w-auto m-5 p-4 text-white bg-slate-900 rounded-lg">
				<div class="mb-6">
					<div class="flex justify-center">
						<label class="bg-slate-700 text-sm font-bold mb-2 rounded px-4 py-2 w-[33%] text-center">Name</label>
					</div>
					<input type="text" name="name" id="name" placeholder="Workout Name" class="appearance-none rounded w-full py-2 px-3 text-white bg-slate-700 leading-tight outline-none active:border-rose-600 focus:border-rose-600" value="{{ $workout->name }}">
					@if ($errors->has('name'))
						<div class="text-red-500 mt-2 text-sm">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<exercise-search-component :init-selected-exercises="{{ $workout->exerciseTypes }}"></exercise-search-component>

				@if ($errors->has('selectedExercises'))
					<div class="text-red-500 mt-2 text-sm">{{ $errors->first('selectedExercises') }}</div>
				@endif

			</div>
		</div>

		<div class="sticky bottom-0">
			<div class="absolute left-6 bottom-28">
				<a href="{{ route('workouts.show', $workout) }}" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
					<x-svg.cross/>
				</a>
			</div>
			<div class="absolute right-6 bottom-28">
				<button type="submit" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
					<x-svg.check/>
				</button>
			</div>
		</div>

	</form>

@endsection