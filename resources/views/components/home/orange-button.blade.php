@props(['url', 'class' => ''])

<div class="{{ $class }}">
	<a href="{{ $url }}" class="inline-flex items-center p-3 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
		{{ $slot }}
	</a>
</div>
