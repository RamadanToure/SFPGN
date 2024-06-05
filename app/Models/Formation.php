<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'description', 'date_debut', 'date_fin', 'lieu', 'formateur', 'employe_id'
    ];

    // Relation avec l'employé
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
