<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonPharmacie extends Model
{
    use HasFactory;

    protected $table = 'bons_pharmacie';

    protected $fillable = [
        'employe_id',
        'date_emission',
        'montant',
        'description',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
