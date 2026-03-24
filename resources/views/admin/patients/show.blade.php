@extends('admin.maindesign')

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Patient #{{ $patient->id }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ul>
            </div>
            <div class="col-auto">
                <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this patient?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Profile</h5></div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
                    <p><strong>Email:</strong> {{ $patient->user->email ?? '—' }}</p>
                    <p><strong>Phone:</strong> {{ $patient->phone ?? '—' }}</p>
                    <p><strong>Date of birth:</strong> {{ $patient->date_of_birth ?? '—' }}</p>
                    <p><strong>City:</strong> {{ $patient->city ?? '—' }}</p>
                    <p><strong>Country:</strong> {{ $patient->country ?? '—' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Recent appointments</h5></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patient->appointments as $appt)
                                    <tr>
                                        <td>{{ $appt->appointment_date?->format('Y-m-d') }} {{ $appt->appointment_time }}</td>
                                        <td>
                                            @if ($appt->doctor)
                                                {{ $appt->doctor->first_name }} {{ $appt->doctor->last_name }}
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td><span class="badge badge-info">{{ $appt->status }}</span></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="text-center text-muted">No appointments.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
