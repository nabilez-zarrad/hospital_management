<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Doctor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'speciality',
        'price',
        'is_free',
        'rating',
        'total_reviews',
        'image'
    ];

    // relation مع user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation مع appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }



public function section()
{
    return $this->belongsTo(\App\Models\Section::class);
}
    }