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

        $offers = $business->offers; // Obtener las ofertas del negocio

        return view('businesses.show', compact('business', 'offers'));
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
            'email' => 'required|email|max:255|unique:businesses,email',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'google_maps_url' => 'nullable|url',
        ]);

        // Verificar que el usuario tenga un rol permitido
        $allowedRoles = ['business_user', 'admin_user'];
        
        if (!in_array(auth()->user()->role, $allowedRoles)) {
            return redirect()->route('businesses.index')->with('error', 'You do not have permission to create a business.');
        }

        // Agregar owner_id
        $validated['owner_id'] = auth()->id();

        // Crear negocio y verificar
        $business = Business::create($validated);

        if (!$business) {
            return back()->with('error', 'Error saving the business.');
        }

        return redirect()->route('businesses.index')->with('success', 'Business created successfully!');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $business = Business::find($id);

        if (!$business) {
            return redirect()->route('businesses.index')->with('error', 'Business not found.');
        }

        // Verificar que el usuario autenticado sea el propietario del negocio o admin
        if (auth()->id() !== $business->owner_id && auth()->user()->role !== 'admin_user') {
            return redirect()->route('businesses.index')->with('error', 'You do not have permission to edit this business.');
        }

        return view('businesses.edit', compact('business'));
    }

    // Actualizar negocio
    public function update(Request $request, $id)
    {
        $business = Business::find($id);

        if (!$business) {
            return redirect()->route('businesses.index')->with('error', 'Business not found.');
        }

        // Verificar que el usuario autenticado sea el propietario del negocio o admin
        if (auth()->id() !== $business->owner_id && auth()->user()->role !== 'admin_user') {
            return redirect()->route('businesses.index')->with('error', 'You do not have permission to edit this business.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:businesses,email,' . $business->id,
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'google_maps_url' => 'nullable|url',
        ]);

        // Actualizar negocio
        $business->update($validated);

        return redirect()->route('businesses.index')->with('success', 'Business updated successfully!');
    }
}
