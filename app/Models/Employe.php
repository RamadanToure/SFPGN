<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'email',
        'telephone',
        'fonction',
        'type_contrat_id',
        'date_debut',
        'photo',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return 'employes';
    }

    /**
     * Define the relationship to the TypeContrat model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }

    /**
     * Define the relationship to the Evaluation model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    /**
     * Define the relationship to the Sanction model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }

    /**
     * Define the relationship to the Conge model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conges()
    {
        return $this->hasMany(Conge::class, 'employe_id');
    }

    /**
     * Set the value of the photo attribute.
     *
     * @param  string|\Illuminate\Http\UploadedFile  $value
     * @return void
     */
    public function setPhotoAttribute($value)
    {
        // If a new file is provided, store it and update the path in the database
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $path = $value->store('images/employes', 'public');
            $this->attributes['photo'] = $path;
        } elseif (is_string($value)) {
            // If a string is provided, assume it's already the file path
            $this->attributes['photo'] = $value;
        }
    }

    /**
     * Get the full URL of the photo.
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute()
    {
        return $this->attributes['photo']
            ? asset('storage/' . $this->attributes['photo'])
            : null;
    }
}
