<x-layout>
    <x-slot:title>
        Tipos de Cultivo
    </x-slot>

    <main class="max-w-7xl mx-auto mt-10 px-4 lg:px-0">
        <h1 class="text-3xl font-bold text-green-800 mb-10  text-center">
            Catálogo de Tipos de Cultivo
        </h1>

        <!-- Panel de búsqueda y filtros -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Búsqueda -->
            <div class="col-span-1 lg:col-span-1 bg-white p-6 rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Buscar cultivo</h2>
                <form action="{{ route('tipo_cultivos.buscar') }}" method="GET" class="flex flex-col gap-4">
                    <input type="text"
                           name="buscar"
                           value="{{ request('buscar') }}"
                           placeholder="Ej: Olivo, Solanum lycopersicum"
                           class="w-full p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    <button type="submit"
                            class="w-full px-4 py-3 bg-green-500 text-white rounded-lg font-medium shadow hover:bg-green-600 transition-colors duration-200">
                        Buscar
                    </button>
                </form>
            </div>

            <!-- Filtros -->
            <div class="col-span-1 lg:col-span-2 bg-white p-6 rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Filtrar cultivos</h2>
                <form action="{{ route('tipo_cultivos.filtrar') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Familia</label>
                        <select name="familia" class="w-full p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-400">
                            <option value="todas">Todas</option>
                            <option value="Oleaceae">Oleaceae</option>
                            <option value="Rutaceae">Rutaceae</option>
                            <option value="Solanaceae">Solanaceae</option>
                            <option value="Asteraceae">Asteraceae</option>
                            <option value="Vitaceae">Vitaceae</option>
                            <option value="Rosaceae">Rosaceae</option>
                            <option value="Lauraceae">Lauraceae</option>
                            <option value="Poaceae">Poaceae</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Ciclo</label>
                        <select name="ciclo" class="w-full p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-400">
                            <option value="todos">Todos</option>
                            <option value="bianual">Bianual</option>
                            <option value="anual">Anual</option>
                            <option value="perenne">Perenne</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit"
                                class="w-full px-4 py-3 bg-green-500 text-white rounded-lg font-medium shadow hover:bg-green-600 transition-colors duration-200">
                            Filtrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de resultados -->
        <div class="overflow-x-auto rounded-2xl shadow-md">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-green-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nombre Científico</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Familia</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Ciclo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Descripción</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($tipoCultivos as $tipo)
                    <tr class="odd:bg-white even:bg-green-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $tipo->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $tipo->nombre_cientifico }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $tipo->familia }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $tipo->ciclo }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $tipo->descripcion }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 flex justify-center">
            {{ $tipoCultivos->links('pagination::tailwind') }}
        </div>
    </main>
</x-layout>
