@extends('maindesign')

@section('content')

<section class="section">

<div class="container">

<div class="row">

<div class="col-md-4">

<img class="img-fluid"
src="{{ asset('front-end/assets/img/doctors/doctor-thumb-01.jpg') }}">

</div>

<div class="col-md-8">

<h2>{{ $medecin->name }}</h2>

<p><strong>Speciality:</strong> {{ $medecin->section->name }}</p>

<p>Lorem ipsum dolor sit amet, doctor description.</p>

<a href="#" class="btn btn-primary">
Book Appointment
</a>

</div>

</div>

</div>

</section>

@endsection