<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @wireUiScripts
    {{-- <script src="//unpkg.com/alpine-js"></script> --}}
</head>

<body class="font-sans antialiased relative">
    <div class="max-h-screen bg-gray-100">
        <x-shared.navbar />

        <main class="container-full">
            <x-shared.navigations.sidebar />
            @if ($componentContainer == 'single-page')
                <div class="lg:ps-64 2xl:ps-72 lg:pt-24">
                    <div class="container-full px-4">
                        {{ $slot }}
                    </div>
                </div>
            @elseif ($componentContainer == 'home')
                <div class="lg:ps-64 2xl:ps-72 lg:pt-24 p-2 lg:pe-64 2xl:pe-96">
                    <div class="container-full px-4">
                        {{ $slot }}
                    </div>
                </div>
                <div class="hidden lg:block fixed top-0 right-0 h-screen bg-white lg:w-64 2xl:w-96 pt-24">
                    <livewire:shared.events-guaranteed />
                </div>
            @endif
        </main>

        @unless (!auth()?->user()?->newsletter)
            <livewire:shared.subscribe-newsletter />
        @endunless
        {{-- <x-shared.footer /> --}}
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
