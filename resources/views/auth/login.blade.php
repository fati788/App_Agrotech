<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Nuevo Diseño</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

<div class="w-full max-w-md p-6">

    <div class="bg-white shadow-lg rounded-2xl p-8">

        <h2 class="text-center text-3xl font-bold text-green-700 mb-2">Bienvenido</h2>
        <p class="text-center text-gray-500 mb-6">Ingresa a tu cuenta</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-green-700 font-semibold mb-1">Correo electrónico</label>
                <input type="email" name="email" placeholder="tu@correo.com" required
                       class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-green-700 font-semibold mb-1">Contraseña</label>
                <input type="password" name="password" placeholder="******" required
                       class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                    class="w-full py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition">
                Iniciar Sesión
            </button>

        </form>

    </div>

</div>

</body>
</html>
