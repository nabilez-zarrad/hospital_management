<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>{{ __('Register') }} — Doccure</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="icon" href="{{ asset('front-end/assets/img/favicon.png') }}" type="image/x-icon">

	<link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}">

	<style>
		/* Extra polish: match Doccure spacing & validation feedback */
		.login-right .form-group.form-focus { margin-bottom: 1.25rem; }
		.login-right .form-control.is-invalid { border-color: #dc3545; }
		.login-right .invalid-feedback { display: block; font-size: 0.8125rem; margin-top: 0.35rem; }
		.login-right .alert-danger ul { margin-bottom: 0; padding-left: 1.1rem; }
	</style>
</head>

<body class="account-page">

<div class="main-wrapper">

	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-8 offset-md-2">

					<div class="account-content">
						<div class="row align-items-center justify-content-center">

							<div class="col-md-7 col-lg-6 login-left d-none d-md-block">
								<img src="{{ asset('front-end/assets/img/login-banner.png') }}" class="img-fluid" alt="">
							</div>

							<div class="col-md-12 col-lg-6 login-right">

								<div class="login-header">
									<h3>{{ __('Patient Register') }} <a href="{{ route('login') }}">{{ __('Are you a Doctor?') }}</a></h3>
								</div>

								@if ($errors->any())
									<div class="alert alert-danger" role="alert">
										<ul class="mb-0 pl-3">
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<form method="POST" action="{{ route('register') }}">
									@csrf

									<div class="form-group form-focus">
										<input
											type="text"
											class="form-control floating @error('name') is-invalid @enderror"
											name="name"
											id="name"
											value="{{ old('name') }}"
											required
											autofocus
											autocomplete="name"
										>
										<label class="focus-label" for="name">{{ __('Name') }}</label>
										@error('name')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group form-focus">
										<input
											type="email"
											class="form-control floating @error('email') is-invalid @enderror"
											name="email"
											id="email"
											value="{{ old('email') }}"
											required
											autocomplete="username"
										>
										<label class="focus-label" for="email">{{ __('Email') }}</label>
										@error('email')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group form-focus">
										<input
											type="password"
											class="form-control floating @error('password') is-invalid @enderror"
											name="password"
											id="password"
											required
											autocomplete="new-password"
										>
										<label class="focus-label" for="password">{{ __('Create Password') }}</label>
										@error('password')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group form-focus">
										<input
											type="password"
											class="form-control floating @error('password_confirmation') is-invalid @enderror"
											name="password_confirmation"
											id="password_confirmation"
											required
											autocomplete="new-password"
										>
										<label class="focus-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
										@error('password_confirmation')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="text-right">
										<a class="forgot-link" href="{{ route('login') }}">{{ __('Already have an account?') }}</a>
									</div>

									<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
										{{ __('Signup') }}
									</button>

									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>

									<div class="row form-row social-login">
										<div class="col-6">
											<a href="#" class="btn btn-facebook btn-block" tabindex="-1" aria-disabled="true"><i class="fab fa-facebook-f mr-1"></i> Login</a>
										</div>
										<div class="col-6">
											<a href="#" class="btn btn-google btn-block" tabindex="-1" aria-disabled="true"><i class="fab fa-google mr-1"></i> Login</a>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>

<script src="{{ asset('front-end/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/script.js') }}"></script>

</body>
</html>
