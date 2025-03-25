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
        // Busca el rol por nombre
        $role = Role::where('name', $roleName)->first();

        // Busca al usuario por ID
        $user = User::find($userId);

        if ($role && $user) {
            // Asocia el rol con el usuario
            $user->role()->associate($role);
            $user->save();

            return response()->json(['message' => 'Role assigned successfully!'], 200);
        }

        return response()->json(['message' => 'User or Role not found'], 404);
    }
}
