@extends('layouts.app')

@section('content')
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
                  <h1 class="mb-[50px] text-white">                        
                    {{ isset($business) ? 'Edit Business' : 'Create Business' }}
                  </h1>

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

    <section class="section-reset-password">
        <div class="section-space">
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <!-- Business Form -->
                        <form action="{{ route('businesses.store') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="mb-4 block font-semibold text-colorTextTitle">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Business Name"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>
                                <!-- Email -->
                                <div>
                                    <label for="email" class="mb-4 block font-semibold text-colorTextTitle">Email</label>
                                    <input type="email" name="email" id="email" placeholder="example@email.com"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>
                                <!-- Description -->
                                <div>
                                    <label for="description" class="mb-4 block font-semibold text-colorTextTitle">Description</label>
                                    <textarea name="description" id="description" placeholder="Brief business description"
                                        class="w-full rounded-[20px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"></textarea>
                                </div>
                                <!-- Address -->
                                <div>
                                    <label for="address" class="mb-4 block font-semibold text-colorTextTitle">Address</label>
                                    <input type="text" name="address" id="address" placeholder="Business Address"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="mb-4 block font-semibold text-colorTextTitle">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="123-456-7890"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <!-- Google Maps URL -->
                                <div>
                                    <label for="google_maps_url" class="mb-4 block font-semibold text-colorTextTitle">Google Maps URL</label>
                                    <input type="url" name="google_maps_url" id="google_maps_url" placeholder="https://maps.google.com/..."
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-start gap-6">
                                <button type="submit" class="btn btn-primary flex w-full">
                                    <span>Save</span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </form>
                        <!-- Business Form -->
                        <p class="mb-[30px] mt-6">
                            Want to go back?
                            <a href="{{ route('businesses.index') }}" class="font-bold text-colorTextTitle">View Businesses</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
