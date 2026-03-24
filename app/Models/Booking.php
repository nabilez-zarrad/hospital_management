<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = [
    'patient_id',
    'doctor_id',
    'first_name',
    'last_name',
    'email',
    'phone',
    'payment_method',
    'booking_date',
    'booking_time',
];
}