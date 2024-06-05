<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'adresse', 'email', 'telephone', 'responsable'];

    // Ajoutez des relations si nécessaire, par exemple :
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_societe')->withPivot('role');
    }
}
