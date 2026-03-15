<!-- Banner Section -->
<section class="section section-search">
<div class="container-fluid">

<div class="banner-wrapper text-center">

<h1>Welcome to Hospital Management System</h1>

<p>Find the best doctors and book appointments easily.</p>

</div>
<form action="{{ route('search.doctors') }}" method="GET">

<div class="form-group search-info">

<input type="text"
name="search"
class="form-control"
placeholder="Search doctors or speciality">

</div>

<button type="submit" class="btn btn-primary search-btn">
Search
</button>

</form>
</div>
</section>