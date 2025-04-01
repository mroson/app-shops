<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{
    // Mostrar todos los negocios
    public function index()
    {
        $businesses = Business::all();
        return view('businesses.index', compact('businesses'));
    }

    // Mostrar un negocio específico
    public function show($id)
    {
        $business = Business::find($id);
        if (!$business) {
            Log::error("Negocio no encontrado con ID: $id");
            abort(404, 'Negocio no encontrado');
        }

        return view('businesses.show', compact('business'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('businesses.create');
    }

    // Guardar un negocio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'google_maps_url' => 'nullable|url',
        ]);

        // Verificar que el usuario sea "owner"
        if (auth()->user()->role !== 'owner') {
            return redirect()->route('businesses.index')->with('error', 'Only owners can create businesses.');
        }

        // Agregar owner_id
        $validated['owner_id'] = auth()->id();

        // Crear negocio y verificar
        $business = Business::create($validated);

        if (!$business) {
            return back()->with('error', 'Error al guardar el negocio.');
        }

        return redirect()->route('businesses.index')->with('success', 'Business created successfully!');
    }
}
