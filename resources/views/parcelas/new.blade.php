<x-layout>
    <x-slot:title>
        Crear Parcela en {{ $finca->nombre }}
    </x-slot>

    <main class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Crear Parcela en {{ $finca->nombre }}</h1>

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

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre de la parcela</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                       class="mt-1 block w-full border rounded-md p-2" placeholder="Ej: Parcela 1">
            </div>

            <!-- Hectáreas -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Hectáreas</label>
                <input type="number" step="0.01" name="hectareas" value="{{ old('hectareas') }}"
                       class="mt-1 block w-full border rounded-md p-2" placeholder="Ej: 2.5">
            </div>

            <!-- Tipo de Cultivo -->
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

            <!-- Fecha de siembra -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de Siembra</label>
                <input type="date" name="fecha_siembra" value="{{ old('fecha_siembra') }}"
                       class="mt-1 block w-full border rounded-md p-2">
            </div>

            <!-- Estado -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado" class="mt-1 block w-full border rounded-md p-2">
                    <option value="en_cultivo" {{ old('estado') == 'en_cultivo' ? 'selected' : '' }}>En Cultivo</option>
                    <option value="en_descanso" {{ old('estado') == 'en_descanso' ? 'selected' : '' }}>En Descanso</option>
                    <option value="preparacion" {{ old('estado') == 'preparacion' ? 'selected' : '' }}>Preparación</option>
                </select>
            </div>

            <!-- Notas -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Notas</label>
                <textarea name="notas" class="mt-1 block w-full border rounded-md p-2" placeholder="Opcional">{{ old('notas') }}</textarea>
            </div>

            <!-- Botón enviar -->
            <div class="mt-6">
                <button type="submit"
                        class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Crear Parcela
                </button>
            </div>
        </form>
    </main>
</x-layout>
