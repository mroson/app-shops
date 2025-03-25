@extends('layouts.app')

@section('content')
<!-- Main Wrapper -->
<main class="main-wrapper relative overflow-x-clip">
    <!--...::: Register Section Start :::... -->
    <section class="section-register">
        <div class="section-space">
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <h2 class="mb-10 text-center md:mb-[60px] lg:mb-20">
                        Create an Account
                    </h2>
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <!-- Register Form -->
                        <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="mb-4 block font-semibold text-colorTextTitle">Full Name</label>
                                    <input type="text" name="name" id="name" placeholder="John Doe"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="mb-4 block font-semibold text-colorTextTitle">Email Address</label>
                                    <input type="email" name="email" id="email" placeholder="example@gmail.com"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="mb-4 block font-semibold text-colorTextTitle">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Min 8 characters"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required />
                                    @error('password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation" class="mb-4 block font-semibold text-colorTextTitle">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required />
                                </div>
                            </div>

                            <!-- Register Button -->
                            <div class="flex justify-start gap-6">
                                <button type="submit" class="btn btn-primary flex w-full">
                                    <span>Register Now</span>
                                    <span>Register Now</span>
                                </button>
                            </div>
                        </form>
                        <!-- Register Form -->

                        <p class="mb-[30px] mt-6">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-bold text-colorTextTitle">Login</a>
                        </p>

                        <!-- Google Register Button -->
                        <button class="btn btn-outline-black w-full">
                            <span class="flex gap-2">
                                <img src="{{ asset('assets/img/images/home-1/google-icon.svg') }}" alt="google-icon" width="27" height="28" class="inline-block pr-2" />
                                Sign up with Google
                            </span>
                            <span class="flex gap-2">
                                <img src="{{ asset('assets/img/images/home-1/google-icon.svg') }}" alt="google-icon" width="27" height="28" class="inline-block pr-2" />
                                Sign up with Google
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
