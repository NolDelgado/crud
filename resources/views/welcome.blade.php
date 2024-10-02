<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Control de Entradas y Salidas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Control de Entradas y Salidas</h1>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m-2 8a9 9 0 100-18 9 9 0 000 18z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="#" class="underline text-gray-900 dark:text-white">Sistema de Control</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Este sistema permite gestionar de manera eficiente las entradas y salidas de la universidad, brindando mayor control y seguridad para la comunidad universitaria.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="#" class="underline text-gray-900 dark:text-white">Acceso Seguro</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Puedes iniciar sesión o registrarte para acceder a todas las funcionalidades del sistema y gestionar tu asistencia de manera sencilla.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path d="M3 8l7.89 5.26L21 8M5 19h14"></path>
                        </svg>
                        <a href="https://laravel.com" class="ml-1 underline">
                            Laravel Jetstream
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>