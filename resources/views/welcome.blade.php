<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Souhaits d'Anniversaire</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>
<body class="font-sans antialiased">

    <div class="relative min-h-screen flex items-center justify-center bg-[url('/animations/flat-lay-composition-birthday-elements-with-copyspace.jpg')] bg-cover bg-center">

        <div class="absolute inset-0 z-0 opacity-30"></div>

        <div class="w-full max-w-lg p-6 bg-white dark:bg-gray-900 bg-opacity-80 rounded-xl shadow-xl space-y-6 z-10">
            <header class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Bienvenue dans votre application de souhaits d'anniversaire!</h1>
                <p class="text-gray-600 dark:text-gray-400">Connectez-vous ou inscrivez-vous pour commencer à célébrer!</p>
            </header>

            <div id="lottieAnimation" class="animation-container h-64 w-full flex justify-center items-center"></div>

            <nav class="flex flex-col items-center space-y-4">
                @if (Route::has('login'))
                    @auth
                        {{-- <a href="{{ url('/dashboard') }}" class="w-full text-center rounded-md bg-[#FF2D15] text-white py-2 transition hover:bg-[#e63946] focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                            Dashboard
                        </a> --}}
                    @else
                        <a href="{{ route('login') }}" class="w-full text-center rounded-md bg-[#FF2D15] text-white py-2 transition hover:bg-[#e63946] focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-full text-center rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 transition hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </div>

    <style scoped>
        .animation-container {
            width: 100%;
            height: 300px;
            margin: auto;
        }
    </style>
</body>
</html>
