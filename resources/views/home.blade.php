<x-layout>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row mx-auto mt-10">
        <!-- Tarjeta principal -->
        <div class="flex-1 p-6 lg:p-12 bg-white shadow-lg rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none border border-gray-200">
            <h1 class="mb-2 text-xl font-semibold text-gray-800">BIENVENIDO APP Agrotech</h1>
            <p class="mb-4 text-gray-500">Gestiona tus fincas, parcelas y cultivos de forma eficiente.</p>
            <ul class="flex gap-3">
                <li>
                    <a href="{{ route('mis_fincas') }}"
                       class="px-5 py-2 bg-green-500 text-white rounded-md font-medium shadow hover:bg-green-600 transition">
                        Resumen de fincas
                    </a>
                </li>
            </ul>
        </div>

        <!-- Imagen o espacio decorativo opcional -->
        <div class="flex-1 hidden lg:flex bg-green-50 rounded-tr-lg rounded-tl-none lg:rounded-tl-lg lg:rounded-br-lg overflow-hidden">
            <img src="{{asset('storage/images/fondo.jpg')}}" class="w-full h-full object-cover">
        </div>
    </main>
</x-layout>
