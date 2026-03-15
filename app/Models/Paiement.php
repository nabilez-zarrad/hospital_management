<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'amount'
    ];

    // الفاتورة ديال الأداء
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}