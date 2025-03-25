@extends('layouts.app')

@section('content')
<section class="section-team-details">
    <!-- Section Space -->
    <div class="section-space">
        <!-- Section Container -->
        <div class="container">
        <div class="mx-auto mb-10 max-w-2xl text-center md:mb-[60px] lg:mb-20">
    <h2>Your Profile</h2>
            </div>
            <!-- Team Details Area -->
            <div class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-[minmax(0,0.8fr)_1fr] lg:gap-20 xl:gap-24 mb-[60px]">
                
                <!-- Profile Image Block -->
                <div class="mx-auto flex max-w-[532px] flex-col items-center justify-end overflow-hidden rounded-[10px] border-b-4 border-r-4 border-colorTextTitle bg-colorPurpleLight">
                    <img src="{{ $user->profile_image_url }}" alt="profile-image" width="519" height="565" class="rounded-full" />
                </div>
                <!-- Profile Image Block -->

                <!-- Profile Content Block -->
                <div>
                    <h2 class="jos mb-4">{{ $user->name }}</h2>
                    <p class="jos">
                        {{ $user->bio ?? 'This user has no bio.' }}
                    </p>

                    <!-- Profile Info List -->
                    <ul class="flex flex-col gap-y-6 font-title text-2xl font-bold tracking-normal text-colorTextTitle">
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Name:</span>
                            <span>{{ $user->name }}</span>
                        </li>
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Email:</span>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </li>
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Phone:</span>
                            <a href="tel:{{ $user->phone }}">{{ $user->phone ?? 'No phone available' }}</a>
                        </li>
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Residence:</span>
                            <span>{{ $user->residence ?? 'Not specified' }}</span>
                        </li>
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Country:</span>
                            <span>{{ $user->country ?? 'Not specified' }}</span>
                        </li>
                        <li class="jos flex flex-col gap-x-9 gap-y-4 sm:flex-row">
                            <span class="inline-block min-w-[155px]">Instagram Username:</span>
                            <span>{{ $user->instagram_username ?? 'Not specified' }}</span>
                        </li>
                    </ul>
                    <!-- Profile Info List -->
                </div>
                <!-- Profile Content Block -->
            </div>
            <!-- Team Details Area -->

            <!-- Edit Profile Button -->
<div class="flex justify-start gap-6">
    <a href="{{ route('profile.edit') }}" class="btn btn-primary flex w-full">
        <span>Edit Profile</span>
        <span>Edit Profile</span>
    </a>
</div>
        </div>
    </div>
</section>



<section class="section-business-list">

<div class="mx-auto mb-10 max-w-2xl text-center md:mb-[60px] lg:mb-20">
    <h2>Your Businness</h2>
            </div>
    <div class="section-space">
        @forelse ($user->businesses as $business)  
        <!-- Section Container -->
        <div class="container mb-[60px]">
            <div class="grid grid-cols-1 gap-y-20 lg:gap-y-[100px] xl:gap-y-[130px]">
                <!-- Content Area -->
                <div class="grid grid-cols-1 items-center gap-10 md:gap-[60px] lg:grid-cols-2 xl:grid-cols-[minmax(0,0.75fr)_1fr] xl:gap-20">
                    <!-- Image Block -->
                    <div class="jos relative z-10 order-2 mx-auto inline-flex max-w-[500px] items-center justify-center lg:order-1 lg:max-w-full"
                        data-jos_animation="fade-right">
                        <img src="assets/img/images/home-3/content-img-2.png" 
                             alt="{{ $business->name }}" 
                             width="571" height="386"
                             class="max-w-full rounded-[10px] shadow-custom-1" />
                    </div>
                    <!-- Image Block -->

                    <!-- Content Block -->
                    <div class="order-1 lg:order-2">
                        <div class="mb-[30px]">
                            <h2 class="jos">{{ $business->name }}</h2>
                            <p class="mt-5">{{ $business->description ?? 'No description available' }}</p>
                        </div>

                        <!-- Content List -->
                        <ul class="mb-[50px] grid grid-cols-1 gap-y-2">
                            <li class="jos">
                                <div class="flex items-start gap-4">
                                    <span class="h-6 w-6 text-colorTextTitle"><i class="ri-mail-line"></i></span>
                                    <div class="flex-1">
                                        <div class="display-heading display-heading-5">{{ $business->email }}</div>
                                    </div>
                                </div>
                            </li>
                            <li class="jos">
                                <div class="flex items-start gap-4">
                                    <span class="h-6 w-6 text-colorTextTitle"><i class="ri-map-pin-line"></i></span>
                                    <div class="flex-1">
                                        <div class="display-heading display-heading-5">{{ $business->address ?? 'No address provided' }}</div>
                                    </div>
                                </div>
                            </li>
                            <li class="jos">
                                <div class="flex items-start gap-4">
                                    <span class="h-6 w-6 text-colorTextTitle"><i class="ri-phone-line"></i></span>
                                    <div class="flex-1">
                                        <div class="display-heading display-heading-5">{{ $business->phone ?? 'No phone available' }}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Content List -->

                        <!-- Actions -->
                        <div class="flex flex-col gap-3 lg:flex-row">
                            <a href="{{ $business->google_maps_url }}" target="_blank" class="btn btn-outline-black">
                                <span>View on Map</span>
                                <span>View on Map</span>
                            </a>
                            <a href="{{ route('businesses.edit', $business->id) }}" class="btn btn-outline-black">
                                <span>Edit</span>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('businesses.destroy', $business->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">
                                    <span>Delete</span>
                                    <span>Delete</span>
                                </button>
                            </form>
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
</section>

@endsection
