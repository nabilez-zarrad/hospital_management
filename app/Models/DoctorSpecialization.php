<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    protected $table = 'doctor_specializations';
        protected $fillable = ['doctor_id', 'specialization'];

}
