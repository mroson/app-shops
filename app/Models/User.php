<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'residence',
        'country',
        'instagram_username',
    ];

    /**
     * Los atributos que deben estar ocultos para arreglos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses()
{
    return $this->hasMany(Business::class, 'owner_id');
}

// En app/Models/User.php

public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class, 'role_user');
}

public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }
    public function redeemedOffers()
{
    return $this->belongsToMany(Offer::class)->withTimestamps();
}

    
}
