<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link href="{{ asset('front-end/assets/img/favicon.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/plugins/fontawesome/css/all.min.css') }}">
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
                                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Booking</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="booking-doc-info">
                                    <a href="#" class="booking-doc-img">
                                        <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('front-end/assets/img/doctors/doctor-thumb-02.jpg') }}" alt="Doctor Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="#">{{ $doctor->name }}</a></h4>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">
                                                {{ $doctor->feedback ?? 35 }}
                                            </span>
                                        </div>
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $doctor->location ?? 'Unknown location' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <form method="POST" action="{{ route('appointment.store') }}"> --}}
                            @csrf

                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <input type="hidden" name="appointment_date" id="appointment_date">
                            <input type="hidden" name="appointment_time" id="appointment_time">

                            <div class="card booking-schedule schedule-widget">

                                <div class="schedule-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="day-slot">
                                                <ul>
                                                    @php
                                                        $days = [];
                                                        for ($i = 0; $i < 7; $i++) {
                                                            $days[] = \Carbon\Carbon::today()->addDays($i);
                                                        }
                                                    @endphp

                                                    @foreach($days as $index => $day)
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                               class="day-select {{ $index == 0 ? 'active-day' : '' }}"
                                                               data-date="{{ $day->format('Y-m-d') }}">
                                                                <span>{{ $day->format('D') }}</span>
                                                                <span class="slot-date">
                                                                    {{ $day->format('d M') }}
                                                                    <small class="slot-year">{{ $day->format('Y') }}</small>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="schedule-cont">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="time-slot">
                                                <ul class="clearfix">
                                                    <li>
                                                        <a class="timing" href="javascript:void(0)" data-time="09:00">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="javascript:void(0)" data-time="10:00">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="javascript:void(0)" data-time="11:00">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="timing" href="javascript:void(0)" data-time="14:00">
                                                            <span>2:00</span> <span>PM</span>
                                                        </a>
                                                        <a class="timing" href="javascript:void(0)" data-time="15:00">
                                                            <span>3:00</span> <span>PM</span>
                                                        </a>
                                                        <a class="timing" href="javascript:void(0)" data-time="16:00">
                                                            <span>4:00</span> <span>PM</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="submit-section proceed-btn text-right">
                               
                              <a class="btn btn-primary" href="{{ route('patient.checkout', ['doctor_id' => $doctor->id, 'date' => $date ?? '', 'time' => $time ?? '']) }}">Proceed to Pay</a>                             
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget footer-about">
                                <div class="footer-logo">
                                    <img src="{{ asset('front-end/assets/img/footer-logo.png') }}" alt="logo">
                                </div>
                                <div class="footer-about-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="{{ asset('front-end/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-end/assets/js/script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dayButtons = document.querySelectorAll('.day-select');
            const timeButtons = document.querySelectorAll('.timing');
            const appointmentDateInput = document.getElementById('appointment_date');
            const appointmentTimeInput = document.getElementById('appointment_time');

            if (dayButtons.length > 0) {
                appointmentDateInput.value = dayButtons[0].dataset.date;
            }

            dayButtons.forEach(button => {
                button.addEventListener('click', function () {
                    dayButtons.forEach(btn => btn.classList.remove('active-day'));
                    this.classList.add('active-day');
                    appointmentDateInput.value = this.dataset.date;
                });
            });

            timeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    timeButtons.forEach(btn => btn.classList.remove('selected'));
                    this.classList.add('selected');
                    appointmentTimeInput.value = this.dataset.time;
                });
            });
        });
    </script>

    <style>
        .day-select {
            display: block;
            text-align: center;
            color: inherit;
        }

        .active-day {
            color: #20c0f3 !important;
            font-weight: bold;
        }
    </style>
</body>
</html>