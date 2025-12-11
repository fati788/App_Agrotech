<x-layout>
    <x-slot:title>
        Detalle de la Finca
    </x-slot>

    <main class="max-w-6xl mx-auto mt-12 p-8">
        <div class="bg-white rounded-2xl shadow-xl p-12 space-y-8">

            <!-- Título -->
            <h1 class="text-4xl font-bold text-gray-800">{{ $finca->nombre }}</h1>

            <!-- Info general -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Ubicación -->
                <div class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414M13.414 12.414L9.172 8.172M13.414 12.414l4.243 4.243M13.414 12.414L9.172 16.657M12 4v1m0 14v1m8-8h1M4 12H3" />
                    </svg>
                    <p class="text-lg font-medium text-gray-700">Ubicación: {{ $finca->ubicacion }}</p>
                </div>

                <!-- Hectáreas -->
                <div class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 6 4-8 3 6h4" />
                    </svg>
                    <p class="text-lg font-medium text-gray-700">Hectáreas: {{ $finca->hectareasTotales }}</p>
                </div>

            </div>

            <!-- Descripción -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Descripción</h2>
                <p class="text-lg text-gray-700">{{ $finca->descripcion ?? 'Sin descripción.' }}</p>
            </div>

            <!-- Botones -->
            <div class="flex flex-wrap gap-4 mt-8">
                <!-- Editar -->
                <a href="{{ route('fincas.editar', ['finca' => $finca->id]) }}"
                   class="px-8 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-lg hover:bg-green-600 transition-colors duration-200 text-lg">
                    Editar
                </a>

                <!-- Volver -->
                <a href="{{ route('mis_fincas') }}"
                   class="px-8 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-lg hover:bg-gray-300 transition-colors duration-200 text-lg">
                    Volver
                </a>
            </div>

        </div>
    </main>
</x-layout>
