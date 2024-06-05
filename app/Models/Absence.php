<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id', 'motif', 'date_debut', 'date_fin'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
