<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorRegistration extends Model
{
    protected $table = 'doctor_registrations';
    protected $fillable = ['doctor_id', 'registration', 'year'];
}
