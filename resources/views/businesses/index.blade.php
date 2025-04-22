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
                  <h1 class="mb-[50px] text-white">Businesses</h1>

                   <!-- Mensaje de éxito -->
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-md mb-6 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Services
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


    <section class="section-business-list">
        <div class="section-space">
            
   
        @forelse ($businesses ?? [] as $business)  
        
            <!-- Section Container -->
            <div class="container mb-[60px] rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
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
  src="{{ asset('img/images/shop-fullmojo.jpg') }}"
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
                                    
                                    <a href="{{ route('businesses.show', $business->id) }}" class="btn btn-primary">
    Ver Detalles de {{ $business->name }}
</a>
                                </div>
                  </div>
                  <!-- Content Block -->
                </div>
                <!-- Content Area -->
              </div>
            </div>
            <!-- Section Container -->
          
          @empty
                        <div class="jos py-10 text-center text-gray-600">
                            No businesses found.
                        </div>
          @endforelse
          
        </div>
          <!-- Section Space -->

    </section>

    <!--...::: CTA Section Start :::... -->
    <section class="section-cta">
          <!-- Section Background -->
          <div class="bg-colorTextTitle">
            <!-- Section Space -->
            <div class="section-space">
              <!-- Section Container -->
              <div class="container relative z-10">
                <!-- Section Block -->
                <div class="mx-auto max-w-3xl text-center">
                  <h2 class="jos text-white">
                    Has conocer tu negocio, fideliza nuevos clientes
                  </h2>
                  <p class="jos mt-5 text-[#FFFFF9]">
                    Start tracking your sales pipeline, manage leads, and
                    automate your entire sales process in one place so you can
                    easily focus on selling.
                  </p>
                </div>
                <!-- Section Block -->


                <div class="mx-auto mt-[50px] max-w-sm text-center">
                  <!-- Botón para agregar nuevo negocio -->
                <a href="{{ route('businesses.create') }}" class="btn btn-primary">
                        <span>Add New Business</span>
                        <span>Add New Business</span>
                    </a>
                  <span class="jos mt-4 block text-[#FFFFF9]"
                    >Full access. No credit card needed.</span
                  >
                </div>

                <img
                  src="assets/img/abstracts/cta-1-element-1.svg"
                  alt="cta-1-element-1"
                  width="414"
                  height="367"
                  class="jos absolute -bottom-20 right-0 -z-10 hidden xl:inline-block"
                  data-jos_animation="zoom-in"
                />
              </div>
              <!-- Section Container -->
            </div>
            <!-- Section Space -->
          </div>
          <!-- Section Background -->
        </section>
        <!--...::: CTA Section End :::... -->
</main>
@endsection
