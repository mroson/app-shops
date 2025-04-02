<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Crear un nuevo usuario y asignarle un rol
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role_id' => 'required|exists:roles,id',  // Validar que el rol existe
        ]);

        // Crear el usuario (sin el rol, ya que es una relación many-to-many)
        $user = User::create([
            'name'  => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt('defaultpassword'), // Agregar una contraseña predeterminada, o usar un valor de la solicitud.
        ]);

        // Asignar el rol al usuario
        $roleId = $validatedData['role_id'];

        // Asociamos el rol a través de la relación many-to-many
        $user->roles()->attach($roleId); // Usar attach para agregar el rol directamente.

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    // Mostrar todos los usuarios
    public function index()
    {
        // Obtén todos los usuarios desde la base de datos
        $users = User::all();

        // Retorna la vista con los datos de usuarios
        return view('users.index', compact('users'));
 
    }

    public function edit(User $user)
{
    // Mostrar el formulario para editar el usuario y sus roles
    $roles = Role::all();  // Obtener todos los roles
    return view('users.edit', compact('user', 'roles'));
}

public function update(Request $request, User $user)
{
    // Validación de los datos
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'residence' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'instagram_username' => 'nullable|string|max:255',
        'role_id' => 'nullable|exists:roles,id', // Validar que el rol existe
    ]);

    // Actualizar datos del usuario
    $user->update($validatedData);

    // Si el usuario tiene un rol seleccionado, actualizarlo
    if ($request->has('role_id')) {
        $user->roles()->sync([$request->role_id]); // Sincronizar rol
    }

    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
}
}
