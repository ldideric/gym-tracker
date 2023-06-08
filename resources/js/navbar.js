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
