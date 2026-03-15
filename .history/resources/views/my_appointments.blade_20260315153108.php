@extends('maindesign')

@section('content')

<section class="section">

<div class="container">

<h2 class="mb-4">My Appointments</h2>

<table class="table table-bordered">

<thead>

<tr>
<th>Doctor</th>
<th>Speciality</th>
<th>Date</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($appointments as $appointment)

<tr>

<td>{{ $appointment->medecin->name }}</td>

<td>{{ $appointment->section->name }}</td>

<td>{{ $appointment->date_rendezvous }}</td>

<td>{{ $appointment->statut }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</section>

@endsection