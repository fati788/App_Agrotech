<x-layout>
    <x-slot:title>
        Crear nueva Parcela
    </x-slot>

    <main class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Parcela en {{ $finca->nombre }}</h1>

        <!-- Mensajes de validación -->
        @if($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('parcelas.guardar', ['finca' => $finca->id]) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre de la parcela</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                       class="mt-1 block w-full border rounded-md p-2" placeholder="Ej: Parcela 1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Hectáreas</label>
                <input type="number" step="0.01" name="hectareas" value="{{ old('hectareas') }}"
                       class="mt-1 block w-full border rounded-md p-2" placeholder="Ej: 2.5">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tipo de Cultivo</label>
                <select name="tipo_cultivo_id" class="mt-1 block w-full border rounded-md p-2">
                    <option value="">Selecciona un cultivo</option>
                    @foreach($tipoCultivos as $tipo)
                        <option value="{{ $tipo->id }}">
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de Siembra</label>
                <input type="date" name="fecha_siembra" value="{{ old('fecha_siembra') }}"
                       class="mt-1 block w-full border rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado" class="mt-1 block w-full border rounded-md p-2">
                    <option value="en_cultivo" {{ old('estado') == 'en_cultivo' ? 'selected' : '' }}>En Cultivo</option>
                    <option value="en_descanso" {{ old('estado') == 'en_descanso' ? 'selected' : '' }}>En Descanso</option>
                    <option value="preparacion" {{ old('estado') == 'preparacion' ? 'selected' : '' }}>Preparación</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Notas</label>
                <textarea name="notas" class="mt-1 block w-full border rounded-md p-2" placeholder="Opcional">{{ old('notas') }}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                <button type="submit"
                        class="flex-1 bg-green-500 text-white py-3 text-lg rounded-lg font-semibold shadow-md
                                   hover:bg-green-600 transition-colors duration-200">
                    Crear Parcela
                </button>


                <a href="{{ route('mis_parcelas' , ['finca' => $finca->id]) }}"
                   class="flex-1 bg-gray-200 text-gray-800 py-3 text-lg rounded-lg font-semibold shadow-md
                              hover:bg-gray-300 transition-colors duration-200 text-center">
                    Volver
                </a>
            </div>
        </form>
    </main>
</x-layout>
