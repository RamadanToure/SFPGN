<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;

    protected $table = 'primes';
    protected $fillable = [
        'employe_id', 'type', 'montant', 'date'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
