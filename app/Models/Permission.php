<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'guard_name',
    ];

    /**
     * Retourne toutes les permissions associées à un nom de garde spécifique.
     *
     * @param string $guardName
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByGuardName(string $guardName)
    {
        return static::where('guard_name', $guardName)->get();
    }

    /**
     * Crée ou récupère une permission par son nom et sa garde.
     *
     * @param string $name
     * @param string $guardName
     * @return \App\Models\Permission
     */
    public static function findOrCreate(string $name, string $guardName = 'web')
    {
        return static::firstOrCreate(['name' => $name, 'guard_name' => $guardName]);
    }
}
