<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Doctor Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link href="{{ asset('front-end/assets/img/favicon.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/style.css') }}">
</head>
<body>

<div class="main-wrapper">

    @include('patient.header')

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img
                                    src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('front-end/assets/img/doctors/doctor-thumb-02.jpg') }}"
                                    class="img-fluid"
                                    alt="Doctor Image"
                                >
                            </div>

                            <div class="doc-info-cont">
                                <h4 class="doc-name">
                                    Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}
                                </h4>

                                <p class="doc-speciality">
                                    @if($doctor->educations && $doctor->educations->count())
                                        {{ $doctor->educations->pluck('degree')->implode(', ') }}
                                    @endif
                                    @if($doctor->speciality)
                                        - {{ $doctor->speciality }}
                                    @endif
                                </p>

                                <p class="doc-department">
                                    <img src="{{ asset('front-end/assets/img/specialities/specialities-05.png') }}" class="img-fluid" alt="Speciality">
                                    Dentist
                                </p>

                                <div class="rating">
                                    @php
                                        $roundedRating = floor($doctor->rating ?? 0);
                                    @endphp

                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $roundedRating)
                                            <i class="fas fa-star filled"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                        @endif
                                    @endfor

                                    <span class="d-inline-block average-rating">
                                        ({{ $doctor->total_reviews ?? 0 }})
                                    </span>
                                </div>

                                <div class="clinic-details">
                                    <p class="doc-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $doctor->city }}, {{ $doctor->country }}
                                        - <a href="javascript:void(0);">Get Directions</a>
                                    </p>

                                    <ul class="clinic-gallery">
                                        @forelse($doctor->clinicImages as $clinicImage)
                                            <li>
                                                <a href="{{ asset('storage/' . $clinicImage->image) }}" data-fancybox="gallery">
                                                    <img src="{{ asset('storage/' . $clinicImage->image) }}" alt="Clinic Image">
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <a href="{{ asset('front-end/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery">
                                                    <img src="{{ asset('front-end/assets/img/features/feature-01.jpg') }}" alt="Feature">
                                                </a>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>

                                <div class="clinic-services">
                                    @forelse($doctor->services->take(2) as $service)
                                        <span>{{ $service->service }}</span>
                                    @empty
                                        <span>No services added</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> {{ $doctor->total_reviews ?? 0 }} Feedback</li>
                                    <li><i class="fas fa-map-marker-alt"></i> {{ $doctor->city }}, {{ $doctor->country }}</li>
                                    <li>
                                        <i class="far fa-money-bill-alt"></i>
                                        @if($doctor->is_free)
                                            Free
                                        @else
                                            ${{ number_format($doctor->price, 2) }} per hour
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="doctor-action">
                                <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white msg-btn">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div>

                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ route('patient.booking', ['id' => $doctor->id]) }}">
                                    Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body pt-0">

                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="tab-content pt-0">

                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p>{{ $doctor->biography ?? 'No biography added yet.' }}</p>
                                    </div>

                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @forelse($doctor->educations as $education)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{ $education->college }}</a>
                                                                <div>{{ $education->degree }}</div>
                                                                <span class="time">{{ $education->year_of_completion }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>No education added.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Work & Experience</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @forelse($doctor->experiences as $experience)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{ $experience->hospital_name }}</a>
                                                                <span class="time">
                                                                    {{ $experience->from }} - {{ $experience->to }}
                                                                    @if(!empty($experience->designation))
                                                                        ({{ $experience->designation }})
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>No experience added.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @forelse($doctor->awards as $award)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <p class="exp-year">{{ $award->year }}</p>
                                                                <h4 class="exp-title">{{ $award->award }}</h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>No awards added.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="service-list">
                                        <h4>Services</h4>
                                        <ul class="clearfix">
                                            @forelse($doctor->services as $service)
                                                <li>{{ $service->service }}</li>
                                            @empty
                                                <li>No services added.</li>
                                            @endforelse
                                        </ul>
                                    </div>

                                    <div class="service-list">
                                        <h4>Specializations</h4>
                                        <ul class="clearfix">
                                            @forelse($doctor->specializations as $specialization)
                                                <li>{{ $specialization->specialization }}</li>
                                            @empty
                                                <li>No specializations added.</li>
                                            @endforelse
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                            <div class="location-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="clinic-content">
                                            <h4 class="clinic-name"><a href="#">{{ $doctor->clinic_name ?? 'Clinic Name' }}</a></h4>
                                            <p class="doc-speciality">{{ $doctor->speciality }}</p>

                                            <div class="rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= floor($doctor->rating ?? 0))
                                                        <i class="fas fa-star filled"></i>
                                                    @else
                                                        <i class="fas fa-star"></i>
                                                    @endif
                                                @endfor
                                                <span class="d-inline-block average-rating">({{ $doctor->total_reviews ?? 0 }})</span>
                                            </div>

                                            <div class="clinic-details mb-0">
                                                <h5 class="clinic-direction">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ $doctor->clinic_address ?? ($doctor->address_line_1 . ', ' . $doctor->city . ', ' . $doctor->country) }}
                                                    <br>
                                                    <a href="javascript:void(0);">Get Directions</a>
                                                </h5>

                                                <ul>
                                                    @forelse($doctor->clinicImages as $clinicImage)
                                                        <li>
                                                            <a href="{{ asset('storage/' . $clinicImage->image) }}" data-fancybox="gallery2">
                                                                <img src="{{ asset('storage/' . $clinicImage->image) }}" alt="Clinic Image">
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <li>
                                                            <a href="{{ asset('front-end/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery2">
                                                                <img src="{{ asset('front-end/assets/img/features/feature-01.jpg') }}" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="clinic-timing">
                                            <div>
                                                <p class="timings-days"><span>Mon - Sat</span></p>
                                                <p class="timings-times">
                                                    <span>10:00 AM - 2:00 PM</span>
                                                    <span>4:00 PM - 9:00 PM</span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="timings-days"><span>Sun</span></p>
                                                <p class="timings-times"><span>Closed</span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="consult-price">
                                            @if($doctor->is_free)
                                                Free
                                            @else
                                                ${{ number_format($doctor->price, 2) }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                            <div class="widget review-listing">
                                <p>No reviews system connected yet.</p>
                            </div>
                        </div>

                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                <div class="listing-day current">
                                                    <div class="day">Monday - Saturday</div>
                                                    <div class="time-items">
                                                        <span class="open-status"><span class="badge bg-success-light">Open</span></span>
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day closed">
                                                    <div class="day">Sunday</div>
                                                    <div class="time-items">
                                                        <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer"></footer>
</div>

<script src="{{ asset('front-end/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front-end/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/script.js') }}"></script>

</body>
</html>