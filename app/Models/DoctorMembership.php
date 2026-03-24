<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorMembership extends Model
{
    protected $table = 'doctor_memberships';
    protected $fillable = [
        'doctor_id',
         'membership'
    ];
}
