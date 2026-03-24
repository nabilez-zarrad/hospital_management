<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminDoctorsController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::query()
            ->with('user')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function show(Doctor $doctor)
    {
        $doctor->load([
            'user',
            'appointments' => fn ($q) => $q->with('patient')->latest()->limit(50),
        ]);

        return view('admin.doctors.show', compact('doctor'));
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor removed.');
    }
}
