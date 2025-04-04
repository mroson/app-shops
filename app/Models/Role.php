<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    // protected $fillable = ['name'];

    /**
     * Relación muchos a muchos con User
     */
    // Modelo Role
public function users()
{
    return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
}

}
