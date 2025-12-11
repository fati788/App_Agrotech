<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white text-gray-900 min-h-screen flex flex-col">

<header class="bg-green-500 text-white shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4 lg:px-8">

        <!-- Logo -->
        <h3 class="text-xl font-bold">Agrotech</h3>

        <!-- Toggle responsive (sin JS) -->
        <input type="checkbox" id="menu-toggle" class="peer hidden">

        <!-- Botón hamburguesa -->
        <label for="menu-toggle" class="lg:hidden cursor-pointer p-2 rounded-md bg-green-600 hover:bg-green-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor"
                 class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </label>

        <!-- NAV -->
        @if (Route::has('login'))
            <nav class="
                flex flex-col items-center text-center w-full absolute left-0 top-16
                bg-green-500 px-6 py-6 space-y-4 shadow-md
                hidden peer-checked:flex

                lg:flex lg:flex-row lg:static lg:w-auto lg:bg-transparent
                lg:space-y-0 lg:space-x-6 lg:p-0 lg:shadow-none
            ">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Dashboard</a>
                    <a href="{{ route('mis_fincas') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Fincas</a>
                    <a href="{{ route('tipo_cultivos') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Tipos de Cultivo</a>
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Estadísticas</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md bg-white text-green-600 font-medium hover:bg-gray-100 transition">
                            Cerrar Sesión
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md font-medium hover:bg-green-600 transition">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

    </div>
</header>

<!-- CONTENEDOR ARREGLADO -->
<div class="flex-grow w-full px-4 py-6 md:px-8 transition-opacity opacity-100 duration-700 starting:opacity-0">
    {{ $slot }}
</div>

@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif

</body>
</html>
