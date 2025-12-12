<x-layout>
    <x-slot:title>
        Editar Parcela
    </x-slot>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row mx-auto mt-10">
        <div class="flex-1 p-6 lg:p-12 bg-white rounded-xl shadow-lg">

            <h1 class="mb-6 text-3xl font-bold text-gray-800">Editar Parcela</h1>

            <form action="{{ route('parcelas.actualizar', ['finca' => $finca->id , 'parcela' => $parcela->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre de la parcela</label>
                    <input type="text" name="nombre" value="{{ old('nombre' , $parcela->nombre) }}"
                           class="mt-1 block w-full border rounded-md p-2 @error('nombre') border-red-500 @enderror" placeholder="Ej: Parcela 1">
                    @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Hectáreas</label>
                    <input type="number" step="0.01" name="hectareas" value="{{ old('hectareas' , $parcela->hectareas) }}"
                           class="mt-1 block w-full border rounded-md p-2 @error('hectareas') border-red-500 @enderror" placeholder="Ej: 2.5">
                    @error('hectareas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipo de Cultivo</label>
                    <select name="tipo_cultivo_id" class="mt-1 block w-full border rounded-md p-2 @error('tipo_cultivo_id') border-red-500 @enderror">
                        <option value="">Selecciona un cultivo</option>
                        @foreach($tipoCultivos as $tipo)
                            <option value="{{ $tipo->id }}" @selected(old('tipo_cultivo_id', $parcela->tipo_cultivo_id) == $tipo->id)>
                                {{ $tipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipo_cultivo_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha de Siembra</label>
                    <input type="date" name="fecha_siembra" value="{{ old('fecha_siembra' , $parcela->fecha_siembra) }}"
                           class="mt-1 block w-full border rounded-md p-2 @error('fecha_siembra') border-red-500 @enderror">
                    @error('fecha_siembra')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Estado</label>
                    <select name="estado" class="mt-1 block w-full border rounded-md p-2 @error('estado') border-red-500 @enderror">
                        <option value="en_cultivo" @selected(old('estado', $parcela->estado) == 'en_cultivo')>En Cultivo</option>
                        <option value="en_descanso" @selected(old('estado', $parcela->estado) == 'en_descanso')>En Descanso</option>
                        <option value="preparacion" @selected(old('estado', $parcela->estado) == 'preparacion')>Preparación</option>
                    </select>
                    @error('estado')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Notas</label>
                    <textarea name="notas" class="mt-1 block w-full border rounded-md p-2 @error('notas') border-red-500 @enderror" placeholder="Opcional">{{ old('notas' , $parcela->notas) }}</textarea>
                    @error('notas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                    <button type="submit"
                            class="flex-1 bg-green-500 text-white py-3 text-lg rounded-lg font-semibold shadow-md hover:bg-green-600 transition-colors duration-200">
                        Guardar Cambios
                    </button>

                    <a href="{{ route('mis_parcelas' , ['finca' => $finca->id]) }}"
                       class="flex-1 bg-gray-200 text-gray-800 py-3 text-lg rounded-lg font-semibold shadow-md hover:bg-gray-300 transition-colors duration-200 text-center">
                        Volver
                    </a>
                </div>
            </form>

        </div>
    </main>
</x-layout>
