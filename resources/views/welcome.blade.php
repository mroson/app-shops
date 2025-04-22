

@extends('layouts.app')

@section('content')

<!--...::: Hero Section Start :::... -->
<section class="section-hero"  style="background-image: url('{{ asset('img/images/travel-with-mojo.jpg') }}'); background-size: cover; background-position: center;">          <!-- Section Space -->
>
          <!-- Section Space -->
          <div class="section-space-bottom pt-24 md:pt-32 lg:pt-40 xl:pt-52">
            <!-- Section Container -->
            <div class="container">
              <!-- Hero Area -->
              <div
                class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2 xl:grid-cols-[1fr_minmax(0,0.5fr)]"
              >
                <!-- Hero Content Block -->
                <div class="text-center lg:text-left">
                  <h1 class="jos mb-6 text-white">“Tu ciudad.<br />
                  Tu flow. Tu descuento.”</h1>
                  <p class="mx-auto mb-12 max-w-xl lg:mx-0 xxl:max-w-3xl">
                    Building a next-gen crypto wallet and trading platform
                    requires a comprehensive understanding of the evolving to a
                    crypto landscape and the needs of users.
                  </p>

                  <div class="flex flex-wrap gap-6">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                      <span>Create Account</span>
                      <span>Create Account</span>
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-dark">
                      <span>Contact Us</span>
                      <span>Contact Us</span>
                    </a>
                  </div>
                 
                </div>
                <!-- Hero Content Block -->

                <!-- Hero Image Block -->
                <div class="mx-auto">
                  <img
                    src="assets/img/images/home-2/hero-2-img-1.png"
                    alt="hero-2-img-1"
                    width="472"
                    height="567"
                  />
                </div>
                <!-- Hero Image Block -->
              </div>
              <!-- Hero Area -->
            </div>
            <!-- Section Container -->
          </div>
          <!-- Section Space -->
        </section>
        <!--...::: Hero Section End :::... -->

        <!--...::: Fun-fact Section Start :::... -->
        <div class="fun-fact-section">
          <!-- Section Background -->
          <div class="bg-colorTextTitle">
            <!-- Section Space -->
            <div class="py-20 lg:py-[100px]">
              <!-- Section Container -->
              <div class="container">
                <!-- Fun-fact Area  -->
                <ul
                  class="grid grid-cols-1 justify-between gap-x-10 gap-y-10 sm:grid-cols-2 lg:flex"
                >
                  <!-- Fun-fact Item -->
                  <li class="text-center text-white">
                    <div
                      class="display-heading display-heading-2 mb-1 text-white"
                      data-module="countup"
                    >
                      €<span class="start-number" data-countup-number="9"
                        >20</span
                      >K
                    </div>
                    <span>Total value locked</span>
                  </li>
                  <!-- Fun-fact Item -->
                  <!-- Fun-fact Item -->
                  <li class="text-center text-white">
                    <div
                      class="display-heading display-heading-2 mb-1 text-white"
                      data-module="countup"
                    >
                      $<span class="start-number" data-countup-number="5"
                        >5</span
                      >K
                    </div>
                    <span>Total trading volume</span>
                  </li>
                  <!-- Fun-fact Item -->
                  <!-- Fun-fact Item -->
                  <li class="text-center text-white">
                    <div
                      class="display-heading display-heading-2 mb-1 text-white"
                      data-module="countup"
                    >
                      <span class="start-number" data-countup-number="0.1"
                        >0.1</span
                      >%
                    </div>
                    <span>Lowest trade free</span>
                  </li>
                  <!-- Fun-fact Item -->
                  <!-- Fun-fact Item -->
                  <li class="text-center text-white">
                    <div
                      class="display-heading display-heading-2 mb-1 text-white"
                      data-module="countup"
                    >
                      <span class="start-number" data-countup-number="50"
                        >50</span
                      >%
                    </div>
                    <span>Discount on original price</span>
                  </li>
                  <!-- Fun-fact Item -->
                </ul>
                <!-- Fun-fact Area  -->
              </div>
              <!-- Section Container -->
            </div>
            <!-- Section Space -->
          </div>
          <!-- Section Background -->
        </div>
        <!--...::: Fun-fact Section End :::... -->



 <!--...::: Service Section Start :::... -->
 <section class="section-service" id="service">
          <!-- Section Background -->
          <div class="">
            <!-- Section Space -->
            <div class="section-space">
              <!-- Section Container -->
              <div class="container">
                <!-- Section Content Block -->
                <div
                  class="mb-20 flex flex-wrap items-center justify-between gap-10"
                >
                  <div class="max-w-3xl">
                    <h2 class="jos">
                    Tu guía de promociones en Fuerteventura
                                    </h2>
                  </div>
                  <a href="{{ route('offers.index') }}" class="jos btn btn-primary">
                    <span>View all services</span>
                    <span>View all services</span>
                  </a>
                </div>
                <!-- Section Content Block -->

                <!-- Service List -->
                <ul
                  class="grid grid-cols-1 gap-x-6 gap-y-10 md:grid-cols-2 lg:grid-cols-2"
                >
                  <!-- Service Items -->
                  <li class="jos" data-jos_animation="flip-up">
                    <a
                      href="services.html"
                      class="group flex h-full flex-col-reverse items-start gap-4 rounded-[10px] bg-white p-[30px] hover:shadow-custom-1 xl:flex-row xl:items-center"
                    >
                      <!-- Content Block -->
                      <div class="flex-1">
                        <div class="display-heading display-heading-4 mb-4">
                        💰 Descuentos exclusivos en restaurantes, tiendas y más
                        </div>
                        <p>
                          Efficiently organize tasks, responsibilities manage
                          project timelines and ensuring streamlined
                          collaboration.
                        </p>
                      </div>
                      <!-- Content Block -->

                      <!-- Image Block -->
                      <div class="h-auto w-[100px] xxl:w-[170px]">
                        <img
                        src="{{ asset('img/images/home-3/service-img-1.png') }}" 
                          alt="service-img-1"
                          width="170"
                          height="170"
                        />
                      </div>
                      <!-- Image Block -->
                    </a>
                  </li>
                  <!-- Service Items -->
                  <!-- Service Items -->
                  <li class="jos" data-jos_animation="flip-up">
                    <a
                      href="services.html"
                      class="group flex h-full flex-col-reverse items-start gap-4 rounded-[10px] bg-white p-[30px] hover:shadow-custom-1 xl:flex-row xl:items-center"
                    >
                      <!-- Content Block -->
                      <div class="flex-1">
                        <div class="display-heading display-heading-4 mb-4">
                        🏝️ Ahorra en tus negocios locales favoritos
                        </div>
                        <p>
                          This helps managers make informed decisions and
                          improvement optimize workflows for greater efficiency.
                        </p>
                      </div>
                      <!-- Content Block -->

                      <!-- Image Block -->
                      <div class="h-auto w-[100px] xxl:w-[170px]">
                        <img
                        src="{{ asset('img/images/home-3/service-img-2.png') }}" 
                          alt="service-img-2"
                          width="170"
                          height="170"
                        />
                      </div>
                      <!-- Image Block -->
                    </a>
                  </li>
                  <!-- Service Items -->
                  <!-- Service Items -->
                  <li class="jos" data-jos_animation="flip-up">
                    <a
                      href="services.html"
                      class="group flex h-full flex-col-reverse items-start gap-4 rounded-[10px] bg-white p-[30px] hover:shadow-custom-1 xl:flex-row xl:items-center"
                    >
                      <!-- Content Block -->
                      <div class="flex-1">
                        <div class="display-heading display-heading-4 mb-4">
                        🛍️ Compra local, ahorra más
                        </div>
                        <p>
                          Collaborative work, enabling team members to
                          collectively contribute to projects and initiatives.
                        </p>
                      </div>
                      <!-- Content Block -->

                      <!-- Image Block -->
                      <div class="h-auto w-[100px] xxl:w-[170px]">
                        <img
                        src="{{ asset('img/images/home-3/service-img-3.png') }}" 
                          alt="service-img-3"
                          width="170"
                          height="170"
                        />
                      </div>
                      <!-- Image Block -->
                    </a>
                  </li>
                  <!-- Service Items -->
                  <!-- Service Items -->
                  <li class="jos" data-jos_animation="flip-up">
                    <a
                      href="services.html"
                      class="group flex h-full flex-col-reverse items-start gap-4 rounded-[10px] bg-white p-[30px] hover:shadow-custom-1 xl:flex-row xl:items-center"
                    >
                      <!-- Content Block -->
                      <div class="flex-1">
                        <div class="display-heading display-heading-4 mb-4">
                        📌 Explora promociones cerca de ti
                        </div>
                        <p>
                          Monitor work hours, track attendance, & analyze
                          productivity trends to optimize resource & project
                          timelines.
                        </p>
                      </div>
                      <!-- Content Block -->

                      <!-- Image Block -->
                      <div class="h-auto w-[100px] xxl:w-[170px]">
                        <img
                          src="{{ asset('img/images/home-3/service-img-4.png') }}" 

                          alt="service-img-4"
                          width="170"
                          height="170"
                        />
                      </div>
                      <!-- Image Block -->
                    </a>
                  </li>
                  <!-- Service Items -->
                </ul>
                <!-- Service List -->
              </div>
              <!-- Section Container -->
            </div>
            <!-- Section Space -->
          </div>
          <!-- Section Background -->
        </section>
        <!--...::: Service Section End :::... -->


    
@endsection

