
<x-layout>
    <x-slot:title>
        Mis Fincas
    </x-slot>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row gap-6 mx-auto mt-10">
        <div class="flex-1 p-6 lg:p-12 bg-white rounded-xl shadow-lg">
            <h1 class="mb-6 text-2xl font-bold text-gray-800">MIS PARCELAS</h1>

            <!-- Botón Crear Finca -->
            <div class="mb-6">
                <a href="{{route('parcelas.nueva' , ['finca' => $finca->id])}}"
                   class="inline-block px-6 py-2 bg-green-500 text-white rounded-lg font-medium shadow hover:bg-green-600 transition-colors duration-200">
                    Crear parcela
                </a>
            </div>


            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl shadow divide-y divide-gray-200">
                    <thead>
                    <tr class="bg-green-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Hectareas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Fecha Siembra</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Tipo cultivo</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Notas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Acciones</th>

                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($parcelas as $parcela)
                        <tr class="odd:bg-white even:bg-green-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">
                                {{$parcela->nombre}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$parcela->hectareas}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$parcela->fecha_siembra}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @foreach($tipoCultivos as $tipo)
                                    @if($parcela->tipo_cultivo_id == $tipo->id)
                                        {{$tipo->nombre}}
                                    @endif
                                @endforeach
                                  <!--  <a href="#"
                                       class="inline-block px-6 py-2 bg-green-500 text-white rounded-lg font-medium shadow hover:bg-green-600 transition-colors duration-200">
                                        Editar tipo cultivo
                                    </a>-->
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{$parcela->estado}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{$parcela->notas}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap flex gap-3">
                                <!-- Editar -->
                                <div class="flex items-center justify-center w-10 h-10 bg-green-50 text-green-600 rounded-full shadow-md hover:bg-green-100 cursor-pointer transition-all duration-200">
                                    <a  href="{{ route('parcelas.editar', ['finca' => $finca->id , 'parcela' => $parcela->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                            <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h9a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Eliminar -->
                                <div class="flex items-center justify-center w-10 h-10 bg-red-50 text-red-600 rounded-full shadow-md hover:bg-red-100 cursor-pointer transition-all duration-200">
                                    <a href="{{ route('parcelas.eliminar', ['finca' => $finca->id , 'parcela' => $parcela->id]) }}"
                                       onclick="return confirm('¿Seguro que deseas eliminar esta Parcela? Esta acción no puede deshacerse.');">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                  d="M9 3a1 1 0 00-1 1v1H4a1 1 0 000 2h16a1 1 0 100-2h-4V4a1 1 0 00-1-1H9zm-3 6a1 1 0 011-1h10a1 1 0 011 1v9a3 3 0 01-3 3H9a3 3 0 01-3-3V9z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>


                                <!-- Ver detalle -->
                                <div class="flex items-center justify-center w-10 h-10 bg-green-50 text-green-600 rounded-full shadow-md hover:bg-green-100 cursor-pointer transition-all duration-200">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M1.5 12s3.75-7.5 10.5-7.5S22.5 12 22.5 12 18.75 19.5 12 19.5 1.5 12 1.5 12z"/>
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                                        </svg>
                                    </a>
                                </div>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">

                    {{ $parcelas->links() }}
                </div>
            </div>
            <a href="{{ route('mis_fincas') }}"
               class="flex-1 bg-gray-200 text-gray-800 py-3 text-lg rounded-lg font-semibold shadow-md
                              hover:bg-gray-300 transition-colors duration-200 text-center">
                Volver
            </a>
        </div>
    </main>
</x-layout>
