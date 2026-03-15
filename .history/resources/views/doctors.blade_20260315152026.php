@extends('maindesign')

@section('content')

<section class="section section-doctor">

<div class="container">

<div class="section-header text-center">

<h2>Our Doctors</h2>

<p class="sub-title">
Find the best doctors and book an appointment
</p>

</div>

<div class="row">

@foreach($medecins as $medecin)

<div class="col-md-4 col-lg-3 col-sm-6">

<div class="profile-widget">

<div class="doc-img">

<img class="img-fluid"
src="{{ asset('front-end/assets/img/doctors/doctor-thumb-01.jpg') }}"
alt="Doctor Image">

</div>

<div class="pro-content">

<h3 class="title">

{{ $medecin->name }}

</h3>

<p class="speciality">

{{ $medecin->section->name }}

</p>

<div class="row row-sm">

<div class="col-6">

<a href="{{ route('doctor.profile',$medecin->id) }}" class="btn view-btn"> View Profile
</a>

</div>

<div class="col-6">

<a href="#" class="btn book-btn">
Book Now
</a>

</div>

</div>

</div>

</div>

</div>

@endforeach

</div>

</div>

</section>

@endsection