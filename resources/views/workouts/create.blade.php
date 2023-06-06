@extends('layouts.home')

@section('title', 'Create Workout')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-gray-700">

	<h1 class="text-4xl font-bold mb-4">Create Workout</h1>

	<form action="{{ route('workouts.store') }}" method="POST">
		@csrf

		<div class="mb-4">
			<label for="name" class="sr-only">Name</label>
			<input type="text" name="name" id="name" placeholder="Workout Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

			@error('name')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div>
			<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create Workout</button>
		</div>
	</form>
</div>
@endsection