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
		<h1 class="text-4xl font-bold mb-4">{{ $workout->name }}</h1>
		
		<h2 class="text-2xl font-bold mb-2">Exercises:</h2>
		<ul class="list-disc list-inside">
			@foreach ($workout->exercises as $exercise)
				<li>{{ $exercise->name }}</li>
			@endforeach
		</ul>

		<a href="{{ route('workouts.index') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
			Back to workouts
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 ml-2">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
			</svg>
		</a>
	</div>
</body>
</html>