<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;  // Asegúrate de importar Controller

class PasswordController extends Controller
{
    // Aquí aplicamos el middleware 'auth' para proteger las rutas de este controlador
    public function __construct()
    {
        if (!Auth::check()) {
            // Si no está autenticado, redirige al login
            return redirect()->route('login');
        }
    }

      // Método para mostrar el formulario de cambio de contraseña
      public function showChangePasswordForm()
      {
          return view('auth.passwords.change');  // Aquí se debe devolver la vista para cambiar la contraseña
      }
      
    public function update(Request $request)
    {

        // Validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],  // Confirmed asegura que new_password y new_password_confirmation coincidan
        ]);

        // Si la validación falla, regresamos con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        // Si la contraseña actual es correcta, actualizar la nueva contraseña
        Auth::user()->update([
            'password' => Hash::make($request->new_password),  // Encriptar la nueva contraseña
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('profile')->with('status', 'Contraseña actualizada correctamente.');
    }
}
