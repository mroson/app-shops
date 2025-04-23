<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class SavedOfferController extends Controller
{
    /**
     * Muestra las ofertas guardadas del usuario autenticado.
     */
    public function index()
    {
        $offers = Auth::user()->savedOffers()->latest()->paginate(10);
        return view('offers.saved', compact('offers'));
    }

    /**
     * Guarda una oferta para el usuario autenticado.
     */
    public function store(Offer $offer)
    {
        Auth::user()->savedOffers()->syncWithoutDetaching([$offer->id]);
        return back()->with('success', 'Oferta guardada exitosamente.');
    }

    /**
     * Elimina una oferta guardada.
     */
    public function destroy(Offer $offer)
    {
        Auth::user()->savedOffers()->detach($offer->id);
        return back()->with('success', 'Oferta eliminada de guardadas.');
    }
}
