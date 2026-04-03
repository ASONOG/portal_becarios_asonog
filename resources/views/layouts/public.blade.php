<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $description ?? 'Asociación de Organismos No Gubernamentales de Honduras' }}">

        <title>{{ isset($title) ? $title . ' — ' : '' }}{{ config('app.name', 'ASONOG') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased bg-white text-zinc-900 flex flex-col min-h-screen">

        <x-public-navbar />

        <main class="flex-1">
            {{ $slot }}
        </main>

        <x-public-footer />

        @livewireScripts
    </body>
</html>
