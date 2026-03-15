<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medecin;
use App\Models\Section;

class Rendezvous extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'notes',
        'medecin_id',
        'section_id',
        'type',
        'appointment'
    ];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class,'medecin_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}