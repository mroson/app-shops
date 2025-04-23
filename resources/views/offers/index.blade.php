@extends('layouts.app')

@section('content')

 <!-- Main Wrapper -->
 <main class="main-wrapper relative overflow-x-clip">
        <!--...::: Breadcrumb Section Start :::... -->
        <section class="section-breadcrumb">
          <div class="bg-colorTextTitle">
            <div class="breadcrumb-space">
              <div class="container">
                <div class="text-center text-white">
                  <h1 class="mb-[50px] text-white">Offers</h1>

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
                        Offers
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--...::: Breadcrumb Section End :::... -->

    <section class="section-offers-list">
        <div class="section-space">

        @forelse ($offers as $offer)  
            <div class="container mb-[60px] rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
              <div class="grid grid-cols-1 gap-y-20 lg:gap-y-[100px] xl:gap-y-[130px]">
                <div class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-2 xl:grid-cols-[minmax(0,0.75fr)_1fr] xl:gap-20">
                  <!-- Image Block -->
                  <div class="jos relative z-10 order-2 mx-auto inline-flex max-w-[500px] items-center justify-center lg:order-1 lg:max-w-full" data-jos_animation="fade-right">
                    
                    {!! QrCode::size(300)->generate(route('offers.index', $offer->id)) !!}


                  </div>

                  <!-- Content Block -->
                  <div class="order-1 lg:order-2">
                    <div class="mb-[30px]">
                    <form action="{{ route('offers.save', $offer->id) }}" method="POST">
    @csrf
    <button type="submit">Guardar</button>
</form>

<form action="{{ route('offers.unsave', $offer->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar de guardadas</button>
</form>

                    @auth
    @if(auth()->user()->savedOffers->contains($offer->id))
        <form action="{{ route('offers.unsave', $offer->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">💔 Quitar de favoritos</button>
        </form>
    @else
        <form action="{{ route('offers.save', $offer->id) }}" method="POST">
            @csrf
            <button type="submit">❤️ Guardar oferta</button>
        </form>
    @endif
@endauth

                      <h2 class="jos">{{ $offer->title }}</h2>
                      <p class="mt-5">
                        {{ $offer->description ?? 'No description available' }}
                      </p>
                    </div>

                    <ul class="mb-[50px] grid grid-cols-1 gap-y-2">
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle">
                            <i class="ri-store-line"></i>
                          </span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                              Business: {{ $offer->business->name }}
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle">
                            <i class="ri-money-dollar-circle-line"></i>
                          </span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                              Price: ${{ number_format($offer->price, 2) }}
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle">
                            <i class="ri-percent-line"></i>
                          </span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                              Discount: {{ $offer->discount ?? '0' }}%
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle">
                            <i class="ri-calendar-line"></i>
                          </span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                              Valid from {{ $offer->start_date }} to {{ $offer->end_date }}
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>

                    <!-- Acciones -->
                    <div class="flex flex-col gap-3 lg:flex-row">
                    <a href="{{ $offer->business->google_maps_url }}" target="_blank" class="btn btn-outline-black">
                                        <span>View on Map</span>
                                        <span>View on Map</span>
                                    </a>
                      <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-outline-black">
                        <span>Edit</span>
                        <span>Edit</span>
                      </a>
                      <form action="{{ route('offers.destroy', $offer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">
                          <span>Delete</span>
                          <span>Delete</span>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @empty
            <div class="jos py-10 text-center text-gray-600">
                No offers found.
            </div>
        @endforelse
        
        </div>
    </section>

    <!--...::: CTA Section Start :::... -->
    <section class="section-cta">
        <div class="bg-colorTextTitle">
            <div class="section-space">
                <div class="container relative z-10">
                    <div class="mx-auto max-w-3xl text-center">
                        <h2 class="jos text-white">
                            Promote your offers and attract more customers
                        </h2>
                        <p class="jos mt-5 text-[#FFFFF9]">
                            Enhance your business by sharing exclusive discounts and offers.
                        </p>
                    </div>

                    <div class="mx-auto mt-[50px] max-w-sm text-center">
                        <a href="{{ route('offers.create') }}" class="btn btn-primary">
                            <span>Add New Offer</span>
                            <span>Add New Offer</span>
                        </a>
                        <span class="jos mt-4 block text-[#FFFFF9]">
                            Full access. No credit card needed.
                        </span>
                    </div>

                    <img
                        src="{{ asset('assets/img/abstracts/cta-1-element-1.svg') }}"
                        alt="cta-1-element-1"
                        width="414"
                        height="367"
                        class="jos absolute -bottom-20 right-0 -z-10 hidden xl:inline-block"
                        data-jos_animation="zoom-in"
                    />
                </div>
            </div>
        </div>

        <a href="{{ route('offers.saved') }}">Mis ofertas guardadas</a>

    </section>
    <!--...::: CTA Section End :::... -->
</main>

@endsection
