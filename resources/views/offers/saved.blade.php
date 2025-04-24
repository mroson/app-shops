@extends('layouts.app')

@section('content')
<!-- Main Wrapper -->
<main class="main-wrapper relative overflow-x-clip">
        <!--...::: Breadcrumb Section Start :::... -->
        <section class="section-breadcrumb">
          <!-- Breadcrumb Background -->
          <div class="bg-colorTextTitle">
            <!-- Breadcrumb Space -->
            <div class="breadcrumb-space">
              <!-- Breadcrumb Container -->
              <div class="container">
                <div class="text-center text-white">
                  <h1 class="mb-[50px] text-white">My Saved Offers</h1>

                   <!-- Mensaje de éxito -->
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-md mb-6 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Saved offers
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- Breadcrumb Container -->
            </div>
            <!-- Breadcrumb Space -->
          </div>
          <!-- Breadcrumb Background -->
        </section>
        <!--...::: Breadcrumb Section End :::... -->

<section class="section-offers-list">
    <div class="section-space">
        @forelse ($offers as $offer)
            <div class="container mb-[60px] rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                <div class="grid grid-cols-1 gap-y-20 lg:gap-y-[100px] xl:gap-y-[130px]">
                    <div class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-2 xl:grid-cols-[minmax(0,0.75fr)_1fr] xl:gap-20">
                        
                        <!-- QR Code Block -->
                        <div class="jos relative z-10 order-2 mx-auto inline-flex max-w-[500px] items-center justify-center lg:order-1 lg:max-w-full" data-jos_animation="fade-right">
                            {!! QrCode::size(300)->generate(route('offers.index', $offer->id)) !!}
                        </div>

                        <!-- Offer Content -->
                        <div class="order-1 lg:order-2">
                            <div class="mb-[30px]">
                                <div class="flex justify-between items-center">
                                    <h2 class="jos">{{ $offer->title }}</h2>
                                    @auth
                                        @if(auth()->user()->savedOffers->contains($offer->id))
                                            <form action="{{ route('offers.unsave', $offer->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Quitar de favoritos">💔</button>
                                            </form>
                                        @else
                                            <form action="{{ route('offers.save', $offer->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" title="Guardar oferta">❤️</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                <p class="mt-5">{{ $offer->description ?? 'Sin descripción' }}</p>
                            </div>

                            <ul class="mb-[50px] grid grid-cols-1 gap-y-2">
                                <li class="jos flex items-start gap-4">
                                    <i class="ri-store-line text-xl"></i>
                                    <span class="display-heading display-heading-5">
                                        Negocio: {{ $offer->business->name }}
                                    </span>
                                </li>
                                <li class="jos flex items-start gap-4">
                                    <i class="ri-money-dollar-circle-line text-xl"></i>
                                    <span class="display-heading display-heading-5">
                                        Precio: ${{ number_format($offer->price, 2) }}
                                    </span>
                                </li>
                                <li class="jos flex items-start gap-4">
                                    <i class="ri-percent-line text-xl"></i>
                                    <span class="display-heading display-heading-5">
                                        Descuento: {{ $offer->discount ?? '0' }}%
                                    </span>
                                </li>
                                <li class="jos flex items-start gap-4">
                                    <i class="ri-calendar-line text-xl"></i>
                                    <span class="display-heading display-heading-5">
                                        Válido desde {{ $offer->start_date }} hasta {{ $offer->end_date }}
                                    </span>
                                </li>
                            </ul>

                            <!-- Acciones -->
                            <div class="flex flex-col gap-3 lg:flex-row">
                                <a href="{{ $offer->business->google_maps_url }}" target="_blank" class="btn btn-outline-black">
                                    <span>Ver en Mapa</span>
                                    <span>Ver en Mapa</span>
                                </a>
                                <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-outline-black">
                                    <span>Editar</span>
                                    <span>Editar</span>
                                </a>
                                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de eliminar la oferta?')">
                                        <span>Eliminar</span>
                                        <span>Eliminar</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="jos py-10 text-center text-gray-600">
                No tenés ofertas guardadas todavía.
            </div>
        @endforelse
    </div>
</section>

@endsection

