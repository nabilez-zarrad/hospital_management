<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medecin;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function medecins()
    {
        return $this->hasMany(Medecin::class);
    }
}