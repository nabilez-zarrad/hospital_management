<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorEducation extends Model
{
        protected $table = 'doctor_educations';
        protected $fillable = [
            'doctor_id',
            'degree', 'college',
            'year_of_completion'
        ];

}
