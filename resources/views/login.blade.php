<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'MAPSKU') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
	<script src="{{ asset('js/geo-min.js') }}" type="text/javascript" charset="utf-8"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
</head>

<body>
	<div id="app">
		<main class="py-4">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 text-center" style="margin-top: 20px;">
						<h5><strong>FORM LOGIN</strong></h5>
						<h4><strong>MAPSKU</strong></h4>
					</div>
					<div class="col-md-12">
						<div class="card" style="margin-top: 70px;">
							<div class="card-header">Silahkan masukkan username & password</div>
							<div class="card-body">
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group row">
										<label for="email"
											class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
										<div class="col-md-6">
											<input id="email" type="email"
												class="form-control @error('email') is-invalid @enderror" name="email"
												value="{{ old('email') }}" required autocomplete="email" autofocus>
											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<label for="password"
											class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
										<div class="col-md-6">
											<input id="password" type="password"
												class="form-control @error('password') is-invalid @enderror" name="password"
												required autocomplete="current-password">
											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group row mb-0">
										<div class="col-md-8 offset-md-4">
											<br>
											<button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">
												{{ __('Login') }}
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
</body>

</html>