@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Mis Ofertas Guardadas</h1>

    @if($offers->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-xl font-semibold">{{ $offer->title }}</h2>
                    <p class="text-gray-600">{{ $offer->description }}</p>
                    <p class="mt-2"><strong>Precio:</strong> ${{ $offer->price }}</p>
                    <p><strong>Descuento:</strong> {{ $offer->discount }}%</p>
                    <p><strong>Válida desde:</strong> {{ $offer->start_date }}</p>
                    <p><strong>Hasta:</strong> {{ $offer->end_date }}</p>

                    <form action="{{ route('offers.unsave', $offer->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Eliminar de Guardadas
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $offers->links() }}
        </div>
    @else
        <p>No tenés ofertas guardadas todavía.</p>
    @endif
</div>
@endsection
