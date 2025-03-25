<?php
// DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Tightenco\Ziggy\Ziggy;


class DashboardController extends Controller
{
    public function index()
    {
        // Obtener rutas de Ziggy
        $ziggy = new Ziggy;
        $routes = $ziggy->toArray();

        return view('dashboard', compact('routes'));
    }
}
