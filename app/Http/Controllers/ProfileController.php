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

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function showProfile()
    {
        $user = auth()->user()->load('roles'); // ✅ Cargar roles sin afectar el usuario
        $user = auth()->user()->load('businesses'); // Cargar negocios del usuario
        return view('profile.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        $roles = Role::all(); // Obtener todos los roles
        return view('profile.edit', compact('user', 'roles'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'residence' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'instagram_username' => ['nullable', 'string', 'max:255'],
            'role' => 'required|exists:roles,id',
        ]);

        $user = $request->user();

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        $user->roles()->sync([$request->role]); // Asignar rol
        $user->update($validated);

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }

    // Actualizar la contraseña del usuario
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Password updated successfully!');
    }

    /**
     * Delete the user's account.
     */
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
