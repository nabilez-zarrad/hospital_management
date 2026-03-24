<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Rendezvous;
use App\Models\Facture;

class Patient extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'date_birth',
        'phone',
        'gender',
        'blood_group'
    ];

    // public function rendezvous()
    // {
    //     return $this->hasMany(Rendezvous::class);
    // }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function favourites()
{
    return $this->hasMany(\App\Models\PatientFavourite::class, 'patient_id');
}
public function favouriteDoctors()
{
    return $this->belongsToMany(\App\Models\Doctor::class, 'patient_favourites', 'patient_id', 'doctor_id');
}
}