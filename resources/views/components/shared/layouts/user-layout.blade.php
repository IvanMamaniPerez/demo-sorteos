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

<body class="font-sans antialiased">
    <div class="max-h-screen bg-gray-100">
        <x-shared.navbar />

        <main class="container-full grid grid-cols-1 lg:grid-cols-11 pt-20" >
            <div class="hidden lg:block  col-span-2 h-full">
                <x-shared.navigations.sidebar />
            </div>
            @if ($componentContainer == 'single-page')
                <div class="col-span-7">
                    {{ $slot }}
                </div>
            @elseif ($componentContainer == 'home')
                <div class="col-span-6">
                    {{ $slot }}
                </div>
                <div class="col-span-3 p-2">
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
