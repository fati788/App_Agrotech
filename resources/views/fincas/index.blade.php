<x-layout>
    <x-slot:title>
        Mis Fincas
    </x-slot>

    <main class="w-full px-4 md:px-8">
        <div class="flex w-full max-w-6xl flex-col-reverse lg:flex-row gap-6 mx-auto mt-10">

            <div class="flex-1 p-4 sm:p-6 lg:p-12 bg-white rounded-xl shadow-lg w-full">
                <h1 class=" text-4xl font-extrabold  text-green-800 mb-10  text-center">MIS FINCAS</h1>

                <!--  Crear Finca -->
                <div class="mb-6">
                    <a href="{{route('fincas.nueva')}}"
                       class="inline-block px-4 py-2 sm:px-6 bg-green-500 text-white rounded-lg font-medium shadow hover:bg-green-600 transition">
                        Crear finca
                    </a>
                </div>
                <!-- TABLA -->
                <div class="w-full overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full bg-white text-sm">
                        <thead class="text-xs sm:text-sm">
                        <tr class="bg-green-100">
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Ubicación</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Hectáreas</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Descripción</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Parcelas</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-xs sm:text-sm">
                        @foreach($fincas as $finca)
                            <tr class="odd:bg-white even:bg-green-50 transition-colors">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-800 font-medium">
                                    {{$finca->nombre}}
                                </td>

                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{$finca->ubicacion}}
                                </td>

                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{$finca->hectareasTotales}}
                                </td>

                                <td class="px-4 sm:px-6 py-4 text-gray-700">
                                    {{$finca->descripcion}}
                                </td>

                                <td class="p-4 text-center">
                                    <div class="mb-1">
                                        <span class="text-lg sm:text-xl font-bold text-gray-800">
                                            {{ $finca->parcelas->count() }}
                                        </span>
                                        <div class="text-xs text-gray-500 -mt-1">Parcelas</div>
                                    </div>

                                    <a href="{{ route('mis_parcelas' , ['finca' => $finca->id]) }}"
                                       class="inline-block px-2 sm:px-3 py-1.5 bg-green-600 text-white text-xs sm:text-sm font-medium rounded-md shadow hover:bg-green-700 transition">
                                        Gestionar
                                    </a>
                                </td>

                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap flex gap-2 sm:gap-3 justify-center">

                                    <!-- Editar -->
                                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 bg-green-50 text-green-600 rounded-full shadow hover:bg-green-100 transition">
                                        <a href="{{ route('fincas.editar', ['finca' => $finca->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                                <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h9a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Eliminar -->
                                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 bg-red-50 text-red-600 rounded-full shadow hover:bg-red-100 transition">
                                        <a href="{{ route('fincas.eliminar', ['finca' => $finca->id]) }}"
                                           onclick="return confirm('¿Eliminar finca?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M9 3a1 1 0 00-1 1v1H4a1 1 0 000 2h16a1 1 0 100-2h-4V4a1 1 0 00-1-1H9zm-3 6a1 1 0 011-1h10a1 1 0 011 1v9a3 3 0 01-3 3H9a3 3 0 01-3-3V9z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Ver detalle -->
                                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 bg-green-50 text-green-600 rounded-full shadow hover:bg-green-100 transition">
                                        <a href="{{ route('fincas.detalle', ['finca' => $finca->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M1.5 12s3.75-7.5 10.5-7.5S22.5 12 22.5 12 18.75 19.5 12 19.5 1.5 12 1.5 12z"/>
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                                            </svg>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
               <!--Paginacion-->

                <div class="mt-6 flex justify-center">

                    {{ $fincas->links() }}
                </div>
            </div>
        </div>
    </main>
</x-layout>

