<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ str_replace('_', ' ', config('app.name')) }} - Home</title>
	@vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
	<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-gray-700">

		<h1 class="text-4xl font-bold mb-4">{{ str_replace('_', ' ', config('app.name')) }}</h1>
		<p class="mb-2">Welcome to {{ str_replace('_', ' ', config('app.name')) }}!</p>
		<p class="mb-4">Here you can find all the information you need about our services.</p>
		
		@if ($user)
			<p class="text-lg font-bold">You are logged in as {{ $user->name }}.</p>
			
			@foreach ($user->workouts as $workout)
				<div class="my-6 p-4 bg-blue-100 rounded-lg flex justify-between items-center">
					<p class="text-lg font-bold">{{ $workout->name }}</p>
					<a href="{{ route('workouts.show', $workout) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
						View
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 ml-2">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
						</svg>
					</a>
				</div>
			@endforeach

		@else
			<p class="text-red-500 text-lg font-bold">You are not logged in.</p>
		@endif
	</div>
</body>
</html>
