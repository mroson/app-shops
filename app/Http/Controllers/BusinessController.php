<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;


class BusinessController extends Controller
{
    // Mostrar todos los negocios del usuario autenticado
    public function index()
{
    $businesses = Business::all(); // Obtener todos los negocios

    return view('businesses.index', compact('businesses'));
}

    // Mostrar un solo negocio
    public function show($id)
    {
        $business = Business::find($id); // Cambia findOrFail a find para evitar el 404 automático
        if (!$business) {
            Log::error("Negocio no encontrado con ID: $id");
            abort(404, 'Negocio no encontrado');
        }
    
        $offers = $business->offers;
        return view('businesses.show', compact('business', 'offers'));
    }

    // Mostrar el formulario de creación de negocio
    public function create()
    {
        return view('businesses.create');
    }

    // Este es el método que se ejecuta cuando el usuario quiere crear un nuevo negocio.
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'google_maps_url' => 'nullable|url',
        ]);

        // Verificar que el usuario tenga el rol de 'owner' antes de continuar
        $userRole = auth()->user()->role;

        if ($userRole === 'owner') {
            // Asignar el owner_id con el ID del usuario autenticado
            $validated['owner_id'] = auth()->id();

            // Crear el nuevo negocio
            Business::create($validated);

            // Redirigir con mensaje de éxito
            return redirect()->route('businesses.index')->with('success', 'Business created successfully!');
        } elseif ($userRole === 'resident') {
            // Aquí puedes agregar la lógica para residentes si es necesario
            return redirect()->route('businesses.index')->with('error', 'Residents cannot create businesses.');
        } else {
            // El rol es 'tourist', no tiene permisos para crear negocios
            return redirect()->route('businesses.index')->with('error', 'Tourists cannot create businesses.');
        }
    }
    // Mostrar el formulario de edición de un negocio
    public function edit($id)
    {
        $business = Business::findOrFail($id);
        
        // Verificar si el negocio pertenece al usuario autenticado
        if ($business->owner_id != Auth::id()) {
            return redirect()->route('businesses.index')->with('error', 'No tienes permiso para editar este negocio.');
        }

        return view('businesses.edit', compact('business'));
    }

    // Actualizar los datos de un negocio
    public function update(Request $request, $id)
    {
        $business = Business::findOrFail($id);
        
        // Verificar si el negocio pertenece al usuario autenticado
        if ($business->owner_id != Auth::id()) {
            return redirect()->route('businesses.index')->with('error', 'No tienes permiso para actualizar este negocio.');
        }

        // Validación
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'nullable|string',
            'google_maps_url' => 'nullable|url',
        ]);

        // Actualizar los datos del negocio
        $business->update($validatedData);

        return redirect()->route('businesses.index')->with('success', 'Negocio actualizado exitosamente.');
    }

    // Eliminar un negocio
    public function destroy($id)
    {
        $business = Business::findOrFail($id);
        
        // Verificar si el negocio pertenece al usuario autenticado
        if ($business->owner_id != Auth::id()) {
            return redirect()->route('businesses.index')->with('error', 'No tienes permiso para eliminar este negocio.');
        }

        // Eliminar el negocio
        $business->delete();

        return redirect()->route('businesses.index')->with('success', 'Negocio eliminado exitosamente.');
    }
}
