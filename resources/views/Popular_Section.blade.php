<section class="section section-doctor">

<div class="container-fluid">

<div class="section-header text-center">
<h2>Book Our Doctor</h2>
<p class="sub-title">
Find the best doctors and make an appointment
</p>
</div>

<div class="row">

@foreach($doctors as $doctor)
<div class="col-md-4 col-lg-3 col-sm-6">

<div class="profile-widget">

<div class="doc-img">

<img class="img-fluid"
src="{{ asset('front-end/assets/img/doctors/doctor-thumb-01.jpg') }}">

</div>

<div class="pro-content">

<h3 class="title">

{{ $doctor->first_name }} {{ $doctor->last_name }}

</h3>

<p class="speciality">

{{ optional($doctor->section)->name ?? 'General' }}

</p>

<div class="row row-sm">

<div class="col-6">

<a href="#" class="btn view-btn">
View Profile
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