<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ str_replace('_', ' ', config('app.name')) }} - @yield('title')</title>
	<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
	@vite('resources/css/app.css')
	@vite('resources/js/bootstrap.js')
</head>
<body class="bg-gray-100">

	<x-home.navbar></x-home.navbar>

	@yield('content')

</body>
</html>
