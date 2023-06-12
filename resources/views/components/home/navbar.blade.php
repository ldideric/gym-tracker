<div class="container mx-auto px-4">
	<nav class="hidden md:flex items-center justify-between py-2 bg-blue-500 text-white shadow-md">
		<a href="{{ route('home') }}" class="text-2xl font-bold hover:text-gray-200">
			{{ str_replace('_', ' ', config('app.name')) }}
		</a>
		<div class="flex space-x-4">
			<a href="{{ route('home') }}" class="hover:text-purple-600">Home</a>
			<a href="{{ route('workouts.index') }}" class="hover:text-purple-600">Workouts</a>
			<a href="{{ route('dashboard') }}" class="hover:text-purple-600">{{ auth()->user()->name }}</a>
		</div>
	</nav>

	<nav class="fixed bottom-0 inset-x-0 md:hidden bg-slate-900 text-white shadow-md py-4">
		<div class="flex justify-around items-center">
			<a href="{{ route('home') }}">
				<i class="fas fa-home fa-xl text-orange-500"></i>
				<span class="sr-only">Home</span>
			</a>
			<a href="{{ route('workouts.index') }}">
				<i class="fas fa-dumbbell fa-xl text-orange-500"></i>
				<span class="sr-only">Workouts</span>
			</a>
			<a href="{{ route('dashboard') }}">
				<i class="fas fa-user fa-xl text-orange-500"></i>
				<span class="sr-only">{{ auth()->user()->name }}</span>
			</a>
		</div>
	</nav>
</div>
