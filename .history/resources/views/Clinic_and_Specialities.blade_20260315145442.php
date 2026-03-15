<section class="section section-specialities">
<div class="container-fluid">

<div class="section-header text-center">
<h2>Clinic and Specialities</h2>
</div>

<div class="row justify-content-center">
<div class="col-md-9">

<div class="specialities-slider slider">

@foreach($sections as $section)

<div class="speicality-item text-center">

<div class="speicality-img">
<img src="{{ asset('front-end/assets/img/specialities/specialities-01.png') }}" class="img-fluid">
<span><i class="fa fa-circle"></i></span>
</div>

<p>{{ $section->name }}</p>

</div>

@endforeach

</div>

</div>
</div>

</div>
</section>