<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Paiement;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'description',
        'amount'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}