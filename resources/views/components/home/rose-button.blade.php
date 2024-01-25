@props(['url', 'class' => ''])

<div class="{{ $class }}">
    <a href="{{ $url }}" class="inline-flex items-center p-3 bg-transparent text-white border-2 border-rose-600 rounded-xl transition-all ease-in duration-50 hover:bg-rose-600 font-semibold text-xs uppercase tracking-widest hover:text-white focus:outline-none focus:border-rose-500 focus:ring ring-rose-300">
        {{ $slot }}
    </a>
</div>
