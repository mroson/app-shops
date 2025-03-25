<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * Atributos asignables masivamente.
     */
    protected $fillable = [
        'name',
        'owner_id', // Asegúrate de que esté aquí
        'email',
        'description',
        'address',
        'phone',
        'google_maps_url',
    ];

    /**
     * Relación con el usuario (dueño del negocio).
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Relación con las ofertas.
     */
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
