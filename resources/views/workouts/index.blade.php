@extends('layouts.home')

@section('title', 'Overview')

@section('content')

	{{-- <div class="w-[90vw] container flex items-center justify-between mx-auto mt-5"> --}}
		{{-- <x-home.blue-button :url="url()->previous()"><x-svg.left-arrow/></x-home.blue-button> --}}
		{{-- <x-home.green-button :url="route('workouts.create')"><x-svg.plus/></x-home.green-button> --}}
		{{-- <x-home.logout-button :url="route('logout')"></x-home.logout-button> --}}
	{{-- </div> --}}

	<div class="container w-auto mx-5 my-5 p-6 bg-slate-900 border-3 border-slate-500 rounded-lg shadow-md text-white">
		<h1 class="text-4xl font-bold mb-4">{{ str_replace('_', ' ', config('app.name')) }}</h1>
		<p class="mb-2">Welcome to Lietze's {{ str_replace('_', ' ', config('app.name')) }}!</p>
		<p class="mb-4">Here you can find your overview and all your workouts!</p>
		<p class="text-lg font-bold">You are logged in as {{ auth()->user()->name }}.</p>
	</div>

	{{-- <div class="container w-auto mx-5 my-5 p-6 bg-slate-900 border-3 border-slate-500 rounded-lg shadow-md text-white"></div> --}}


	<div class="mb-24">
		@forelse (auth()->user()->workouts as $workout)
		<div class="container w-auto mx-5 my-5 p-4 text-white bg-slate-900 border-3 border-slate-500 rounded-lg">
			<div class="flex justify-between items-center">
				<p class="text-lg font-bold">{{ $workout->name }}</p>
				<x-home.orange-button :url="route('workouts.show', $workout)">View</x-home.orange-button>
			</div>
		</div>
		@empty
		<p class="text-red-500 text-lg my-6 font-bold">You have no workouts yet!</p>
		@endforelse
	</div>

	<div class="sticky bottom-0">
		<a href="{{ route('workouts.create') }}" class="border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 absolute right-6 bottom-28 w-12 h-12 rounded-full">
			<div class="w-full h-full flex items-center justify-center">
				<x-svg.plus/>
			</div>
		</a>
	</div>
	

@endsection
