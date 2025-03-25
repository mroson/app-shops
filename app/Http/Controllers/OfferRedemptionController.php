<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OfferRedemptionController extends Controller
{
    public function redeem($token)
    {
        $offer = Offer::where('token', $token)->first();

        if (!$offer) {
            return redirect()->route('home')->with('error', 'Oferta inválida o expirada.');
        }

        // Si está logueado, registramos la redención
        if (Auth::check()) {
            $user = Auth::user();

            // Evitar que el mismo usuario la escanee múltiples veces
            if (!$offer->users()->where('user_id', $user->id)->exists()) {
                $offer->users()->attach($user->id);
            }

            return view('offers.redeemed', compact('offer'));
        } else {
            return redirect()->route('login')->with('error', 'Iniciá sesión para redimir la oferta.');
        }
    }
}
