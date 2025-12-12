<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center min-h-screen p-4">

<div class="w-full max-w-md">

    <div class="bg-white/80 backdrop-blur-md shadow-xl rounded-3xl p-10 border border-green-200">

        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
        </div>

        <h3 class="text-center text-3xl font-extrabold text-green-700 mb-1">Crear Cuenta</h3>
        <p class="text-center text-gray-600 mb-8">Regístrate para comenzar</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-5">
                <label class="block text-green-700 font-semibold mb-1">Nombre completo</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Juan Pérez" required
                       class="w-full px-4 py-2.5 border border-green-300 rounded-xl bg-white/70 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-5">
                <label class="block text-green-700 font-semibold mb-1">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="tu@correo.com" required
                       class="w-full px-4 py-2.5 border border-green-300 rounded-xl bg-white/70 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-5">
                <label class="block text-green-700 font-semibold mb-1">Contraseña (8 caracteres)</label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full px-4 py-2.5 border border-green-300 rounded-xl bg-white/70 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-7">
                <label class="block text-green-700 font-semibold mb-1">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" placeholder="••••••••" required
                       class="w-full px-4 py-2.5 border border-green-300 rounded-xl bg-white/70 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
            </div>

            <button type="submit"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg shadow-green-300 transition transform hover:-translate-y-0.5">
                Registrarse
            </button>

            <p class="text-center mt-6 text-gray-500">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-green-700 font-medium hover:underline">Inicia sesión aquí</a>
            </p>

        </form>

    </div>

</div>

</body>
</html>
