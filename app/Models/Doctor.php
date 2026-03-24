<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Doctor extends Model
{
     protected $fillable = [
        'user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'phone',
        'speciality',
        'price',
        'is_free',
        'rating',
        'total_reviews',
        'image',
        'gender',
        'date_of_birth',
        'biography',
        'clinic_name',
        'clinic_address',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'country',
        'postal_code',
        'section_id',
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
public function favouritedByPatients()
{
    return $this->belongsToMany(\App\Models\Patient::class, 'patient_favourites', 'doctor_id', 'patient_id');
}


    public function clinicImages()
    {
        return $this->hasMany(DoctorClinicImage::class);
    }

    public function services()
    {
        return $this->hasMany(DoctorService::class);
    }

    public function specializations()
    {
        return $this->hasMany(DoctorSpecialization::class);
    }

    public function educations()
    {
        return $this->hasMany(DoctorEducation::class);
    }

    public function experiences()
    {
        return $this->hasMany(DoctorExperience::class);
    }

    public function awards()
    {
        return $this->hasMany(DoctorAward::class);
    }

    public function memberships()
    {
        return $this->hasMany(DoctorMembership::class);
    }

    public function registrations()
    {
        return $this->hasMany(DoctorRegistration::class);
    }



    }