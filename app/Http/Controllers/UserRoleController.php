<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Asigna un rol a un usuario.
     *
     * @param int $userId
     * @param string $roleName
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignRoleToUser($userId, $roleName)
    {
        // Verifica si el usuario existe
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Verifica si el rol existe
        $role = Role::where('name', $roleName)->first();
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        // Verifica si el usuario ya tiene ese rol
        if ($user->roles->contains('name', $roleName)) {
            return response()->json(['message' => 'User already has this role'], 400);
        }

        // Asigna el rol al usuario
        $user->roles()->syncWithoutDetaching([$role->id]);

        return response()->json(['message' => 'Role assigned successfully!'], 200);
    }
}

