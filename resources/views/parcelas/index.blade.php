<x-layout>
    <x-slot:title>
        Mis Parcelas
    </x-slot>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row gap-6 mx-auto mt-10">

        <div class="flex-1 p-6 lg:p-10 bg-white rounded-2xl shadow-xl border border-gray-100">
            <h1 class="mb-10 text-4xl font-extrabold  text-green-800  text-center">
                MIS PARCELAS
            </h1>

            <!--Crear Finca -->

            <div class="mb-8">
                <a href="{{route('parcelas.nueva' , ['finca' => $finca->id])}}"
                   class="inline-block px-6 py-3 bg-green-600 text-white rounded-xl font-semibold shadow hover:bg-green-700 transition-colors duration-200">
                    Crear parcela
                </a>
            </div>

            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                <div class="overflow-x-auto">
                    <!--tabla -->
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr class="bg-green-100 border-b border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Nombre</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Hectáreas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Fecha Siembra</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Tipo cultivo</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Estado</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Notas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase">Acciones</th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                        @foreach($parcelas as $parcela)
                            <tr class="odd:bg-white even:bg-green-50 hover:bg-green-100 transition-colors duration-200">

                                <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                    {{$parcela->nombre}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{$parcela->hectareas}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{$parcela->fecha_siembra}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    @foreach($tipoCultivos as $tipo)
                                        @if($parcela->tipo_cultivo_id == $tipo->id)
                                            {{$tipo->nombre}}
                                        @endif
                                    @endforeach
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{$parcela->estado}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{$parcela->notas}}
                                </td>

                                <td class="px-6 py-4 flex gap-3">

                                    <!-- Editar -->

                                    <a href="{{ route('parcelas.editar', ['finca' => $finca->id , 'parcela' => $parcela->id]) }}"
                                       class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-700 rounded-full shadow hover:bg-green-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                            <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h9a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>

                                    <!-- Eliminar -->

                                    <a href="{{ route('parcelas.eliminar', ['finca' => $finca->id , 'parcela' => $parcela->id]) }}"
                                       onclick="return confirm('¿Seguro que deseas eliminar esta Parcela? Esta acción no puede deshacerse.');"
                                       class="flex items-center justify-center w-10 h-10 bg-red-100 text-red-700 rounded-full shadow hover:bg-red-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                  d="M9 3a1 1 0 00-1 1v1H4a1 1 0 000 2h16a1 1 0 100-2h-4V4a1 1 0 00-1-1H9zm-3 6a1 1 0 011-1h10a1 1 0 011 1v9a3 3 0 01-3 3H9a3 3 0 01-3-3V9z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->

                <div class="p-6 flex justify-center bg-gray-50 border-t border-gray-200">
                    {{ $parcelas->links() }}
                </div>
            </div>

            <!-- Botón Volver -->
            <div class="mt-10">
                <a href="{{ route('mis_fincas') }}"
                   class="inline-block px-8 py-3 bg-gray-200 text-gray-800 rounded-xl font-semibold shadow hover:bg-gray-300 transition duration-200">
                    Volver
                </a>
            </div>

        </div>

    </main>
</x-layout>
