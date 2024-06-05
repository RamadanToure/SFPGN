<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paie extends Model
{

    use HasFactory;
    protected $table = 'paies';

    protected $fillable = ['employe_id', 'mois_paie', 'salaire_base'];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
