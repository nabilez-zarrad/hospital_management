<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorExperience extends Model
{
    protected $table = 'doctor_experiences';

    protected $fillable = [
        'doctor_id',
        'hospital_name',
        'from',
        'to',
        'designation',
    ];
}