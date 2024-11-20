<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Charme&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Charme&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
{{-- <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

<style>
    html,
    body {
        height: 100%;
        overflow: hidden;
        margin: 0;
    }
</style>

<!-- Scripts -->
@routes
@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
@inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
