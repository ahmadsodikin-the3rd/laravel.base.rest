<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel Base REST') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel Base REST') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('docs') }}">{{ __('API Docs') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('auth.register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('auth.register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('auth.logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@guest
				@yield('content')
			@else
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="list-group">
								<a href="{{route('home')}}" class="list-group-item list-group-item-action {{ stristr(request()->route()->getName(),'home') ? 'active' : ''}}">Home</a>
								<a href="{{route('user.index')}}" class="list-group-item list-group-item-action {{ stristr(request()->route()->getName(),'user') ? 'active' : ''}}">User</a>
								<a href="{{route('task.index')}}" class="list-group-item list-group-item-action {{ stristr(request()->route()->getName(),'task') ? 'active' : ''}}">My Task</a>
								<a href="{{route('docs')}}" class="list-group-item list-group-item-action {{ stristr(request()->route()->getName(),'docs') ? 'active' : ''}}">API Docs</a>
							</div>
						</div>
						<div class="col-md-9">
							@yield('content')
						</div>
					</div>
				</div>
			@endguest
		</main>
	</div>
</body>
</html>
