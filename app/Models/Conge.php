<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'date_debut', 'date_fin', 'motif', 'approuve'];

    // Relation avec l'employé
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    // Méthode pour obtenir la période du congé
    public function getPeriodeAttribute()
    {
        if ($this->date_debut && $this->date_fin) {
            $date_debut = new \DateTime($this->date_debut);
            $date_fin = new \DateTime($this->date_fin);

            return $date_debut->format('d/m/Y') . ' - ' . $date_fin->format('d/m/Y');
        } else {
            return 'Dates non disponibles';
        }
    }
}

