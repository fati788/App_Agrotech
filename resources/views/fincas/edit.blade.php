<x-layout>
    <x-slot:title>
        Editar Finca
    </x-slot>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row mx-auto mt-10">
        <div class="flex-1 p-6 lg:p-12 bg-white rounded-xl shadow-lg">

            <h1 class="mb-6 text-3xl font-bold text-gray-800">Editar Finca</h1>

            <form method="POST" action="{{ route('fincas.actualizar', $finca->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-2">
                        Nombre de la finca
                    </label>
                    <input
                        type="text"
                        name="nombre"
                        value="{{ old('nombre', $finca->nombre) }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm
                            focus:ring-2 focus:ring-green-500 focus:outline-none"
                    />
                </div>

                <!-- Ubicación -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-2">
                        Ubicación
                    </label>
                    <input
                        type="text"
                        name="ubicacion"
                        value="{{ old('ubicacion', $finca->ubicacion) }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm
                            focus:ring-2 focus:ring-green-500 focus:outline-none"
                    />
                </div>

                <!-- Hectáreas -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-2">
                        Hectáreas Totales
                    </label>
                    <input
                        type="number"
                        name="hectareasTotales"
                        step="0.01"
                        value="{{ old('hectareasTotales', $finca->hectareasTotales) }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm
                            focus:ring-2 focus:ring-green-500 focus:outline-none"
                    />
                </div>

                <!-- Descripción -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-2">
                        Descripción
                    </label>
                    <textarea
                        name="descripcion"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm
                            focus:ring-2 focus:ring-green-500 focus:outline-none resize-none"
                    >{{ old('descripcion', $finca->descripcion) }}</textarea>
                </div>

                <!-- Botones Guardar y Volver -->
                <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                    <button type="submit"
                            class="flex-1 bg-green-500 text-white py-3 text-lg rounded-lg font-semibold shadow-md
                                   hover:bg-green-600 transition-colors duration-200">
                        Guardar Cambios
                    </button>

                    <a href="{{ route('mis_fincas') }}"
                       class="flex-1 bg-gray-200 text-gray-800 py-3 text-lg rounded-lg font-semibold shadow-md
                              hover:bg-gray-300 transition-colors duration-200 text-center">
                        Volver
                    </a>
                </div>

            </form>

        </div>
    </main>
</x-layout>
