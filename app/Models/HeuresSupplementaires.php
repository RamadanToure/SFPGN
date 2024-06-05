<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeuresSupplementaires extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'nombre_heures', 'date_heure_supplementaire'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
