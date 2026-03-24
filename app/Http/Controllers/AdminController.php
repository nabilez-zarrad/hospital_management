<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $doctorsCount = Doctor::count();
        $patientsCount = Patient::count();
        $appointmentsCount = Appointment::count();
        $specialtiesCount = Section::count();

        $appointmentsByStatus = Appointment::select('status', DB::raw('count(*) as aggregate'))
            ->groupBy('status')
            ->pluck('aggregate', 'status');

        return view('admin.dashboard', compact(
            'doctorsCount',
            'patientsCount',
            'appointmentsCount',
            'specialtiesCount',
            'appointmentsByStatus'
        ));
    }

    public function createDoctor()
    {
        $doctors = Doctor::latest()->get();
        return view('admin.add_doctor', compact('doctors'));
    }

    public function storeDoctor(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('doctors', 'public');
        }
$request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'phone' => 'nullable|string|max:20',
    'gender' => 'nullable|string|max:20',
    'date_of_birth' => 'nullable|date',
    'speciality' => 'nullable|string|max:255',
    'clinic_name' => 'nullable|string|max:255',
    'clinic_address' => 'nullable|string|max:255',
    'city' => 'nullable|string|max:255',
    'state' => 'nullable|string|max:255',
    'country' => 'nullable|string|max:255',
    'postal_code' => 'nullable|string|max:20',
    'price' => 'nullable|numeric',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
]);
        Doctor::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'biography' => $request->biography,
            'speciality' => $request->speciality,
            'clinic_name' => $request->clinic_name,
            'clinic_address' => $request->clinic_address,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'price' => $request->price ?? 0,
            'is_free' => (bool) ($request->is_free ?? true),
            'rating' => 0,
            'total_reviews' => 0,
            'image' => $image,
        ]);

        return back()->with('success', 'Doctor Added Successfully');
    }
}