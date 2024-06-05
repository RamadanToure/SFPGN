<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id', 'note', 'commentaire'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
