@extends('layouts.app')

@section('content')
<main class="main-wrapper relative overflow-x-clip">
    <section class="section-edit-profile">
        <div class="section-space">
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <h2 class="mb-10 text-center md:mb-[60px] lg:mb-20">
                        Edit Profile
                    </h2>
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <!-- Profile Edit Form -->
                        <!-- Success Message -->
                        @if (session('status'))
                            <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Change Password Form -->
                        <form action="{{ route('password.update') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="mb-4 block font-semibold text-colorTextTitle">Current Password</label>
                                <input type="password" name="current_password" id="current_password" 
                                    class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none" 
                                    required>
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="new_password" class="mb-4 block font-semibold text-colorTextTitle">New Password</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                    required>
                                @error('new_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label for="new_password_confirmation" class="mb-4 block font-semibold text-colorTextTitle">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                    required>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-start gap-6">
                                <button type="submit" class="btn btn-primary flex w-full">
                                    <span>Update Password 2</span>
                                    <span>Update Password 2</span>
                                </button>
                            </div>
                        </form>
                        <!-- Change Password Form -->

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
