

@extends('layouts.app')

@section('content')

 <!--...::: Service Section Start :::... -->
 <section class="section-service" id="service">
          <!-- Section Background -->
          <div class="bg-colorGrey">
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
                  <a href="services.html" class="jos btn btn-primary">
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

