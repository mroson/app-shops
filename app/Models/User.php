<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'residence',
        'country',
        'instagram_username',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class, 'owner_id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withTimestamps();
        return $this->belongsToMany(Offer::class, 'offer_scans');
    }

    public function redeemedOffers()
    {
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        // Usamos el evento 'created' para asegurarnos que el usuario se guarda primero
        static::created(function ($user) {
            // Buscar el rol por nombre
            $defaultRole = Role::where('name', 'tourist_user')->first();

            if ($defaultRole) {
                // Asignar el rol al usuario
                $user->roles()->attach($defaultRole->id);
            }
        });
    }
}
