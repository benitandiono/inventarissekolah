<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FAVICON GLOBAL (ANTI BERUBAH DI SEMUA MENU) -->
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=2">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('/storage/background-login.png'); /* ganti sesuai lokasi gambarmu */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="flex items-center justify-center min-h-screen">

            {{ $slot }}
        </div>
    </div>
</body>
</html>
