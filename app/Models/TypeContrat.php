<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    use HasFactory;

    protected $table = 'type_contrats';

    protected $fillable = [
        'nom',
    ];


    public function employes()
    {
        return $this->hasMany(Employe::class, 'type_contrat_id');
    }
}
