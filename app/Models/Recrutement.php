<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    use HasFactory;

    protected $fillable = [
        'poste', 'description', 'date_limite',
    ];

    // Vous pouvez définir des relations avec d'autres modèles ici, par exemple, si vous avez un modèle Candidat.

    // Exemple de méthode pour obtenir les recrutements actifs
    public function scopeActif($query)
    {
        return $query->where('statut', 1);
    }
}
