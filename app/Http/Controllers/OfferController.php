<?php 


namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Business;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->paginate(10);
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        $businesses = Business::all();
        return view('offers.create', compact('businesses'));
    }

    public function store(Request $request)
{
    $request->validate([
        'business_id' => 'required|exists:businesses,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'audience' => 'required|string',
        'discount' => 'nullable|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:active,inactive',
    ]);

    // Create a new offer with the token explicitly set
    $validated = $request->all();
    $validated['token'] = Str::uuid(); // Generate a UUID for the token

    // Create the offer with the validated data, including the token
    $offer = Offer::create($validated);

    // (Optional) Generate QR Code
    $qr = QrCode::size(250)->generate(route('offers.redeem', $offer->token));

    // Save the QR code in the database if you want
    $offer->qr_code = $qr;
    $offer->save();

    return redirect()->route('offers.index')->with('success', 'Offer created successfully.');
}


    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    public function edit(Offer $offer)
    {
        $businesses = Business::all();
        return view('offers.edit', compact('offer', 'businesses'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'audience' => 'required|string',
            'discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        // Aquí actualizamos la oferta existente
        $offer->update([
            'business_id' => $request->business_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'audience' => $request->audience,
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status === 'active',
        ]);

        // Si el código QR necesita ser actualizado, podemos hacerlo aquí
        $qr = QrCode::size(250)->generate(route('offers.redeem', $offer->token));
        $offer->qr_code = $qr;
        $offer->save(); // Guardamos el nuevo QR

        return redirect()->route('offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offer deleted successfully.');
    }
}
