@extends('layouts.home')

@section('title', 'Sessions')

@section('content')

	<div class="container w-auto p-6 text-white">
		<h1 class="text-4xl text-rose-600 font-bold mb-4"><i class="fas fa-chart-simple"></i> Sessions</h1>
		<p class="mb-2 text-lg font-bold">Good morning, {{ auth()->user()->name }}!</p>
		<p class="mb-4">Track and manage your gym <span class="font-bold text-rose-600">sessions</span> here.</p>
		<p>Stay motivated, record your progress, and push your limits!</p>
	</div>

	<div class="w-full border-t-3 border-rose-600"></div>

	<div class="mb-44">
		<dropdown-details-session-component :grouped-exercises="{{ $exercises }}" :show-url-pattern="'{{ route('sessions.show', ['session' => '__ID__']) }}'"></dropdown-details-session-component>
	</div>

	{{-- @if (auth()->user()->workouts->count())
		<div class="sticky bottom-0">
			<div class="absolute right-6 bottom-28">
				<a href="{{ route('workouts.create') }}" class="flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
					<x-svg.plus/>
				</a>
			</div>
		</div>
	@endif --}}

@endsection
