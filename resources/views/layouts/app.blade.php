<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Site font -->
    <link rel="stylesheet" href="{{ asset('fonts/iconfonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/webfonts/fonts.css') }}">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendors/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/jos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/menu.css') }}">

    <!-- Custom CSS (después de Tailwind para que puedas sobrescribir) -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Tailwind CSS and app.js via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Development CSS (si quieres que esto sobrescriba Tailwind, colócalo aquí) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    </head>
    <body class="relative">
        <div class="page-wrapper relative">
        
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        @include('layouts.footer')

</div>
        <!-- Vendor JS -->
<script src="{{ asset('js/vendors/counterup.js') }}"></script>
<script src="{{ asset('js/vendors/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/vendors/fslightbox.js') }}"></script>
<script src="{{ asset('js/vendors/jos.min.js') }}"></script>
<script src="{{ asset('js/vendors/menu.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>
