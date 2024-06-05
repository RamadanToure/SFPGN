<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'type_contrat_id', 'date_debut', 'date_fin', 'historique'];

    protected $casts = [
        'historique' => 'array',
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    // Relation avec le modèle TypeContrat
    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }

    public function addHistorique($modification)
    {
        // Utilisation de la méthode push pour ajouter un élément au tableau historique
        $this->historique = $this->historique ?? [];
        $this->historique[] = ['modification' => $modification, 'timestamp' => now()];
        $this->save();
    }
}
