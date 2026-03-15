<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap.min.css') }}">

<!-- Fontawesome -->
<link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}">

</head>

<body class="account-page">

<div class="main-wrapper">

<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-8 offset-md-2">

<div class="account-content">

<div class="row align-items-center justify-content-center">

<div class="col-md-7 col-lg-6 login-left">
<img src="{{ asset('front-end/assets/img/login-banner.png') }}" class="img-fluid">
</div>

<div class="col-md-12 col-lg-6 login-right">

<div class="login-header">
<h3>Login <span>Doccure</span></h3>
</div>

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="form-group form-focus">
<input type="email" name="email" class="form-control floating" required>
<label class="focus-label">Email</label>
</div>

<div class="form-group form-focus">
<input type="password" name="password" class="form-control floating" required>
<label class="focus-label">Password</label>
</div>

<div class="text-right">
<a class="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
</div>

<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
Login
</button>

<div class="text-center dont-have">
Don’t have an account? <a href="{{ route('register') }}">Register</a>
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

</div>

<!-- JS -->
<script src="{{ asset('front-end/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/script.js') }}"></script>

</body>
</html>