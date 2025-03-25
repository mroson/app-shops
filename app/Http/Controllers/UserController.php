<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        // Obtén todos los usuarios desde la base de datos
        $users = User::all();

        // Retorna la vista con los datos de usuarios
        return view('users.index', compact('users'));
    }


    public function assignRole(Request $request, User $user)
    {
        $role = Role::where('name', $request->role)->first();
    
        if ($role) {
            $user->roles()->attach($role->id);
            return response()->json(['message' => 'Role assigned successfully']);
    }

            return response()->json(['message' => 'Role not found'], 404);
}
}