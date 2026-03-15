@extends('maindesign')

@section('content')

<div class="container">

<h2>Add Doctor</h2>

<form action="{{ route('store.doctor') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label>Name</label>
<input type="text" name="nom" class="form-control">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="form-group">
<label>Phone</label>
<input type="text" name="telephone" class="form-control">
</div>

<div class="form-group">
<label>Speciality</label>

<select name="section_id" class="form-control">

@foreach($sections as $section)

<option value="{{ $section->id }}">
{{ $section->nom }}
</option>

@endforeach

</select>

</div>

<div class="form-group">
<label>Address</label>
<input type="text" name="adresse" class="form-control">
</div>

<div class="form-group">
<label>Experience (years)</label>
<input type="number" name="experience" class="form-control">
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="form-group">
<label>Doctor Image</label>
<input type="file" name="image" class="form-control">
</div>

<br>

<button class="btn btn-primary">

Add Doctor

</button>

</form>

</div>

@endsection