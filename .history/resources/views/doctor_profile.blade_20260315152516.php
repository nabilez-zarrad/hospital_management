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
<form action="{{ route('book.appointment') }}" method="POST">

@csrf

<input type="hidden" name="medecin_id" value="{{ $medecin->id }}">
<input type="hidden" name="section_id" value="{{ $medecin->section_id }}">

<div class="form-group">

<label>Choose Date</label>

<input type="datetime-local"
name="date_rendezvous"
class="form-control"
required>

</div>

<button type="submit" class="btn btn-primary">

Book Appointment

</button>

</form>

</section>

@endsection