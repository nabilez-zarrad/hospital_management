<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Patient;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
      $request->validate([
    'doctor_id' => 'required|exists:doctors,id',
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'phone' => 'required|string|max:20',
    'payment_method' => 'required|in:paypal,card',
    'booking_date' => 'required|date',
    'booking_time' => 'required',

        ]);

        $patient = Patient::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
            ]
        );

        $booking = Booking::create([
    'patient_id' => $patient->id,
    'doctor_id' => $request->doctor_id,
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'email' => $request->email,
    'phone' => $request->phone,
    'payment_method' => $request->payment_method,
    'booking_date' => $request->booking_date,
    'booking_time' => $request->booking_time,
]);

return redirect()->route('booking.success', $booking->id); 
    }
}