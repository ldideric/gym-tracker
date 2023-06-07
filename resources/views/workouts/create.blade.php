@extends('layouts.home')

@section('title', 'Create Workout')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-gray-700" id="app">

	<h1 class="text-4xl font-bold mb-4">Create Workout</h1>

	<form action="{{ route('workouts.store') }}" method="POST" id="app">
	@method('PUT')
	@csrf

		<div class="mb-4">
			<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
			<input type="text" name="name" id="name" placeholder="Workout Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" value="{{ old('name') }}">
			@error('name')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div id="app">
			<exercise-search-component></exercise-search-component>
		</div>

		<div class="mt-4">
			<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create Workout</button>
		</div>

	</form>

</div>
@endsection