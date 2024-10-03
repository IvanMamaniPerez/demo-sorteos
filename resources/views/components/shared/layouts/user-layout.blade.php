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
    {{-- <script src="//unpkg.com/alpinejs"></script> --}}
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-shared.navbar />
        <!-- Page Content -->
        <main class="container-full max-w-7xl mx-auto">
            {{ $slot }}
        </main>
        @unless (auth()?->user()->newsletter)
            <livewire:shared.subscribe-newsletter />
        @endunless
        {{-- <x-shared.footer /> --}}
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
