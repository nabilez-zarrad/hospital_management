<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Image;
use App\Models\Section;
use App\Models\Rendezvous;

class Medecin extends Authenticatable
{
    use HasFactory;



    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

   public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}