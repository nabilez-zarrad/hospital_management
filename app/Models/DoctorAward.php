<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorAward extends Model
{
    protected $table = 'doctor_awards';
    protected $fillable = [
        'doctor_id', 
        'award', 
        'year'
    ];
}
