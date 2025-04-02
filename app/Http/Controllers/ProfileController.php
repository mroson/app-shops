<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function showProfile()
    {
        $user = auth()->user();
    $roles = Role::all() ?? collect([]); // Si no hay roles, devuelve una colección vacía

        return view('profile.profile', compact('user','roles'));
    }

    public function edit()
{
    $user = auth()->user()->load('roles'); // ✅ Cargar roles correctamente
    $roles = Role::all(); // Obtener todos los roles disponibles


    return view('profile.edit', compact('user', 'roles'));
}

public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        'phone' => ['nullable', 'string', 'max:20'],
        'residence' => ['nullable', 'string', 'max:255'],
        'country' => ['nullable', 'string', 'max:255'],
        'instagram_username' => ['nullable', 'string', 'max:255'],
        'role_id' => ['nullable', 'exists:roles,id'], // ✅ Asegurar que el role_id exista en la BD
    ]);

    $user = $request->user();
    $user->update(collect($validated)->except('role_id')->toArray()); // Evitar actualizar role_id directamente en users

    // Verificar si el usuario ya tiene un rol asignado
    if ($request->filled('role_id')) {
        $user->roles()->sync([$validated['role_id']]); // ✅ Asigna el nuevo role_id
    } elseif (!$user->roles()->exists()) {
        // Si el usuario no tiene rol, asignar el rol "tourist_user" (ID: 2) por defecto
        $defaultRole = Role::find(1); // Role ID: 2 -> "tourist_user"
        if ($defaultRole) {
            $user->roles()->sync([$defaultRole->id]); // ✅ Asignar "tourist_user"
        }
    }

    return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
}

    
public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
