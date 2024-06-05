<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'color',
        'url',
    ];

    // Relation avec le congé associé
    public function conge()
    {
        return $this->belongsTo(Conge::class, 'conge_id');
    }
}
