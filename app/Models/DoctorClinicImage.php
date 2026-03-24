<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorClinicImage extends Model
{
        protected $table = 'doctor_clinic_images';

    protected $fillable = ['doctor_id', 'image'];
}
