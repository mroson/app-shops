@extends('layouts.app')

@section('content')
<main class="main-wrapper relative overflow-x-clip">

<!--...::: Breadcrumb Section Start :::... -->
<section class="section-breadcrumb">
    <div class="bg-colorTextTitle">
        <div class="breadcrumb-space">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="mb-[50px] text-white">Edit Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--...::: Breadcrumb Section End :::... -->
@if(session('status'))
    <p class="text-green-500 text-sm font-bold">
        {{ session('status') }}
    </p>
@endif

<section class="section-edit-profile">
    <div class="section-space">
        <div class="container">
            <div class="mx-auto max-w-[860px]">
                <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                    <!-- Profile Edit Form -->
                    <form action="{{ route('profile.update') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <label for="name" class="mb-4 block font-semibold text-colorTextTitle">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ old('name', $user->name) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-4 block font-semibold text-colorTextTitle">Email</label>
                            <input type="email" name="email" id="email" placeholder="example@email.com"
                                value="{{ old('email', $user->email) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="mb-4 block font-semibold text-colorTextTitle">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="123-456-7890"
                                value="{{ old('phone', $user->phone) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Residence -->
                        <div>
                            <label for="residence" class="mb-4 block font-semibold text-colorTextTitle">Residence</label>
                            <input type="text" name="residence" id="residence" placeholder="Your Residence"
                                value="{{ old('residence', $user->residence) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                            @error('residence')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Country -->
                        <div>
                            <label for="country" class="mb-4 block font-semibold text-colorTextTitle">Country</label>
                            <input type="text" name="country" id="country" placeholder="Your Country"
                                value="{{ old('country', $user->country) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Instagram Username -->
                        <div>
                            <label for="instagram_username" class="mb-4 block font-semibold text-colorTextTitle">Instagram Username</label>
                            <input type="text" name="instagram_username" id="instagram_username" placeholder="Your Instagram Username"
                                value="{{ old('instagram_username', $user->instagram_username) }}"
                                class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                            @error('instagram_username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- User Role -->
<div>
    
</div>

                        <!-- Submit Button -->
                        <div class="flex justify-start gap-6">
                            <button type="submit" class="btn btn-primary flex w-full">
                                <span>Save Changes</span>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </form>
                    <!-- Profile Edit Form -->

                    <p class="mb-[30px] mt-6">
                        Want to go back?
                        <a href="{{ route('profile.profile') }}" class="font-bold text-colorTextTitle">View Profile</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
