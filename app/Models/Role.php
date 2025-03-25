<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Si tu tabla se llama "roles" (en plural), no necesitas especificar el nombre de la tabla,
    // pero si fuera otro nombre, puedes hacerlo de la siguiente manera:
    // protected $table = 'nombre_de_tu_tabla';

    // Establecemos los campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
    ];

    // En app/Models/Role.php

public function users()
{
    return $this->belongsToMany(User::class);
}

}
