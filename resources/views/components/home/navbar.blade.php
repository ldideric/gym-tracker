
<header class="bg-blue-500 py-4 sticky top-0 z-50">
	<div class="container mx-auto px-4">
		<nav class="flex items-center justify-between">
			<a href="/">
				<h1 class="text-white text-2xl font-bold">{{ str_replace('_', ' ', config('app.name')) }}</h1>
			</a>
			<div class="relative">
				<button type="button" id="menuButton" class="flex sm:hidden text-white hover:text-gray-200 focus:outline-none">
					<svg id="menuOpen" class="h-6 w-6 block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="fill-current" d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<svg id="menuClose" class="h-6 w-6 hidden" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="fill-current" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<div id="mobileMenu" class="hidden absolute top-8 right-64 w-64 bg-blue-500 text-white opacity-0 mt-2 py-2 rounded-lg shadow-lg transition-all duration-300 transform translate-x-64 overflow-hidden">
					<a href="{{ route('workouts.index') }}" class="block py-1 px-5 hover:bg-blue-400 rounded transition">Workouts</a>
					<a href="#" class="block py-1 px-5 hover:bg-blue-400 rounded transition">About</a>
					<a href="#" class="block py-1 px-5 hover:bg-blue-400 rounded transition">Contact</a>
				</div>
			</div>
			<ul class="hidden sm:flex space-x-4">
				<li><a href="#" class="text-white hover:text-gray-200">Home</a></li>
				<li><a href="#" class="text-white hover:text-gray-200">About</a></li>
				<li><a href="#" class="text-white hover:text-gray-200">Contact</a></li>
			</ul>
		</nav>
	</div>
</header>

<script>
	const menuButton = document.getElementById('menuButton');
	const mobileMenu = document.getElementById('mobileMenu');
	const menuOpen = document.getElementById('menuOpen');
	const menuClose = document.getElementById('menuClose');

	menuButton.addEventListener('click', () => {
		mobileMenu.classList.toggle('translate-x-0');
		mobileMenu.classList.toggle('opacity-100');
		mobileMenu.classList.toggle('hidden');
		menuOpen.classList.toggle('hidden');
		menuClose.classList.toggle('hidden');
	});
</script>
