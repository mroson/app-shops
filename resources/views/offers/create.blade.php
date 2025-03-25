@extends('layouts.app')

@section('content')
<main class="main-wrapper relative overflow-x-clip">
    <!--...::: Breadcrumb Section Start :::... -->
    <section class="section-breadcrumb">
        <div class="bg-colorTextTitle">
            <div class="breadcrumb-space">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="mb-[50px] text-white">                        
                            {{ isset($offer) ? 'Edit Offer' : 'Create Offer' }}
                        </h1>
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

    <section class="section-create-offer">
        <div class="section-space">
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <!-- Offer Form -->
                        <form action="{{ isset($offer) ? route('offers.update', $offer->id) : route('offers.store') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            @isset($offer)
                                @method('PUT')
                            @endisset
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Business -->
                                <div>
                                    <label for="business_id" class="mb-4 block font-semibold text-colorTextTitle">Business</label>
                                    <select 
                                        name="business_id" 
                                        id="business_id" 
                                        required
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                    >
                                        <option value="">Select a Business</option>
                                        @foreach($businesses as $business)
                                            <option 
                                                value="{{ $business->id }}" 
                                                {{ old('business_id', $offer->business_id ?? '') == $business->id ? 'selected' : '' }}
                                            >
                                                {{ $business->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Title -->
                                <div>
                                    <label for="title" class="mb-4 block font-semibold text-colorTextTitle">Title</label>
                                    <input type="text" name="title" id="title" placeholder="Offer Title" value="{{ old('title', $offer->title ?? '') }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="mb-4 block font-semibold text-colorTextTitle">Description</label>
                                    <textarea name="description" id="description" placeholder="Brief offer description"
                                        class="w-full rounded-[20px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">{{ old('description', $offer->description ?? '') }}</textarea>
                                </div>

                                <!-- Price -->
                                <div>
                                    <label for="price" class="mb-4 block font-semibold text-colorTextTitle">Price</label>
                                    <input type="number" name="price" id="price" placeholder="Offer Price" step="0.01" value="{{ old('price', $offer->price ?? '') }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>

                                <!-- Discount -->
                                <div>
                                    <label for="discount" class="mb-4 block font-semibold text-colorTextTitle">Discount (%)</label>
                                    <input type="number" name="discount" id="discount" placeholder="Discount Percentage" step="1" value="{{ old('discount', $offer->discount ?? '') }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>

                                <!-- Start Date -->
                                <div>
                                    <label for="start_date" class="mb-4 block font-semibold text-colorTextTitle">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $offer->start_date ?? '') }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>

                                <!-- End Date -->
                                <div>
                                    <label for="end_date" class="mb-4 block font-semibold text-colorTextTitle">End Date</label>
                                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $offer->end_date ?? '') }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>

                                <!-- Audience -->
                                <div>
                                    <label for="audience" class="mb-4 block font-semibold text-colorTextTitle">Audience</label>
                                    <select 
                                        name="audience" 
                                        id="audience" 
                                        required
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                    >
                                        <option value="">Select Audience</option>
                                        <option value="resident" {{ old('audience', $offer->audience ?? '') == 'resident' ? 'selected' : '' }}>Resident</option>
                                        <option value="tourist" {{ old('audience', $offer->audience ?? '') == 'tourist' ? 'selected' : '' }}>Tourist</option>
                                        <option value="all" {{ old('audience', $offer->audience ?? '') == 'all' ? 'selected' : '' }}>All</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status" class="mb-4 block font-semibold text-colorTextTitle">Status</label>
                                    <select 
                                        name="status" 
                                        id="status" 
                                        required
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                    >
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status', $offer->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $offer->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
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
                        <!-- Offer Form -->
                        <p class="mb-[30px] mt-6">
                            Want to go back?
                            <a href="{{ route('offers.index') }}" class="font-bold text-colorTextTitle">View Offers</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection