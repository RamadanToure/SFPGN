<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeuresTravail extends Model
{
    use HasFactory;

    protected $table = 'heures_travail';

    protected $fillable = [
        'employe_id', 'heure_entree', 'heure_sortie'
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
