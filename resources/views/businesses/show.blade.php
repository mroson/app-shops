@extends('layouts.app')

@section('content')


<section class="section-business-list">
        <div class="section-space">
            
   
        
            <!-- Section Container -->
            <div class="container mb-[60px]">
              <div
                class="grid grid-cols-1 gap-y-20 lg:gap-y-[100px] xl:gap-y-[130px]"
              >
                <!-- Content Area -->
                <div
                  class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-2 xl:grid-cols-[minmax(0,0.75fr)_1fr] xl:gap-20"
                >
                  <!-- Image Block -->
                  <div
                    class="jos relative z-10 order-2 mx-auto inline-flex max-w-[500px] items-center justify-center lg:order-1 lg:max-w-full"
                    data-jos_animation="fade-right"
                  >
                    <img
                      src="assets/img/images/home-3/content-img-2.png"
                      alt="content-img-2"
                      width="571"
                      height="386"
                      class="max-w-full rounded-[10px] shadow-custom-1"
                    />
                  </div>
                  <!-- Image Block -->
                  <!-- Content Block -->
                  <div class="order-1 lg:order-2">
                    <!-- Section Block -->
                    <div class="mb-[30px]">
                      <h2 class="jos">{{ $business->name }}</h2>
                      <p class="mt-5">
                      {{ $business->description ?? 'No description available' }}
                      </p>
                    </div>
                    <!-- Section Block -->
                    <!-- Content List -->
                    <ul class="mb-[50px] grid grid-cols-1 gap-y-2">
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle"
                            ><i class="ri-mail-line"></i></span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                            {{ $business->email }}
                                                    </div>
                          </div>
                        </div>
                      </li>
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle"
                            ><i class="ri-map-pin-line"></i></span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                            {{ $business->address ?? 'No address provided' }}
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="jos">
                        <div class="flex items-start gap-4">
                          <span class="h-6 w-6 text-colorTextTitle"
                            ><i class="ri-phone-line"></i></span>
                          <div class="flex-1">
                            <div class="display-heading display-heading-5">
                            {{ $business->phone ?? 'No phone available' }}
                            </div>
                          </div>
                        </div>
                      </li>
                      
                    </ul>
                    <!-- Content List -->
                      <!-- Acciones -->
                      <div class="flex flex-col gap-3 lg:flex-row">
                      <a href="{{ $business->google_maps_url }}" target="_blank" class="btn btn-outline-black">
                                        <span>View on Map</span>
                                        <span>View on Map</span>
                                    </a>
                                    

                                    <!-- Mostrar opciones de edición solo si el usuario autenticado es el dueño -->
    @if(auth()->check() && auth()->id() === $business->owner_id)
        <a href="{{ route('businesses.edit', $business->id) }}" class="btn btn-primary">Editar Negocio</a>
    @endif

                                </div>
                  </div>
                  <!-- Content Block -->
                </div>
                <!-- Content Area -->
              </div>
            </div>
            <!-- Section Container -->
          
         
        </div>
          <!-- Section Space -->

    </section>


<section class="section-offers-list">
    
<div class="mx-auto mb-10 max-w-2xl text-center md:mb-[60px] lg:mb-20">
    <h2>Ofertas Disponibles</h2>
            </div>
    
    @if($offers->count() > 0)
    <div class="section-space">
            @foreach($offers as $offer)
            <div class="container mb-[60px]">
              <div class="grid grid-cols-1 gap-y-20 lg:gap-y-[100px] xl:gap-y-[130px]">
                <div class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-2 xl:grid-cols-[minmax(0,0.75fr)_1fr] xl:gap-20">
                  <!-- Image Block -->
                  <div class="jos relative z-10 order-2 mx-auto inline-flex max-w-[500px] items-center justify-center lg:order-1 lg:max-w-full" data-jos_animation="fade-right">
                 
                    {!! QrCode::size(300)->generate(route('offers.index', $offer->id)) !!}

                  </div>

                  <!-- Content Block -->
                  <div class="order-1 lg:order-2">
                    <div class="mb-[30px]">
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
            @endforeach

                @else
                <div class="mx-auto mb-10 max-w-2xl text-center md:mb-[60px] lg:mb-20">
                    <h3>No hay ofertas disponibles.</h3>
                </div>
                @endif           
            
               

    </div>
    </section>

    <h2 class="text-xl font-bold mb-4">Usuarios que escanearon ofertas</h2>

@foreach ($business->offers as $offer)
    <div class="mb-4">
        <h3 class="font-semibold">{{ $offer->title }}</h3>
        <ul class="list-disc ml-5">
            @foreach ($offer->users as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
@endforeach

@endsection
