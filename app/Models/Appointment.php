<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    // relation مع patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // relation مع doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}