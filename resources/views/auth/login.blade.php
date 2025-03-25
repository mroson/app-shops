@extends('layouts.app')

@section('content')
<!-- Main Wrapper -->
<main class="main-wrapper relative overflow-x-clip">
    <!--...::: Login Section Start :::... -->
    <section class="section-login">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <h2 class="mb-10 text-center md:mb-[60px] lg:mb-20">
                        Welcome back
                    </h2>
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <!-- Auth Form -->
                        <form method="POST" action="{{ route('login') }}" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            <div class="grid grid-cols-1 gap-6">
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
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex flex-wrap items-center justify-between gap-6">
                                <label for="remember" class="flex items-center gap-[10px]">
                                    <input type="checkbox" name="remember" id="remember" class="size-5 rounded-[4px] border border-colorPurpleLight checked:bg-colorPurpleLight" />
                                    <span>Remember me</span>
                                </label>

                                <a href="{{ route('password.request') }}" class="text-colorPurpleLight">Forget Password?</a>
                            </div>

                            <!-- Login Button -->
                            <div class="flex justify-start gap-6">
                                <button type="submit" class="btn btn-primary flex w-full">
                                    <span>Login Now</span>
                                    <span>Login Now</span>
                                </button>
                            </div>
                        </form>
                        <!-- Auth Form -->

                        <p class="mb-[30px] mt-6">
                            Don’t have an account?
                            <a href="{{ route('register') }}" class="font-bold text-colorTextTitle">Sign Up</a>
                        </p>

                        <!-- Google Sign-In Button -->
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
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!--...::: Login Section End :::... -->
</main>
<!-- Main Wrapper -->
@endsection
