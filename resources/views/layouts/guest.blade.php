<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('/img/senakitch.ico') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
      
        <!-- Scripts -->
        @vite(['resources/js/app.js']) 

        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
    </body>
</html>
