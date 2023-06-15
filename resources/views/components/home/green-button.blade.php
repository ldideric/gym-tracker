@props(['url', 'class' => ''])

<div class="{{ $class }}">
	<a href="{{ $url }}" class="inline-flex items-center p-3 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
		{{ $slot }}
	</a>
</div>
