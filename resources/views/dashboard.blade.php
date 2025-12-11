<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>

    <main class="max-w-7xl mx-auto mt-6 p-4 md:p-6 space-y-8">

        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard</h1>

        <!-- Estadísticas principales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            <div class="bg-green-500 text-white p-4 md:p-6 rounded-xl shadow-lg">
                <p class="text-xs md:text-sm font-medium">Total de Fincas</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $totalFincas }}</p>
            </div>

            <div class="bg-green-500 text-white p-4 md:p-6 rounded-xl shadow-lg">
                <p class="text-xs md:text-sm font-medium">Hectáreas Totales</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $hectareasTotales }}</p>
            </div>

            <div class="bg-green-500 text-white p-4 md:p-6 rounded-xl shadow-lg">
                <p class="text-xs md:text-sm font-medium">Total de Parcelas</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $totalParcelas }}</p>
            </div>

            <div class="bg-green-500 text-white p-4 md:p-6 rounded-xl shadow-lg">
                <p class="text-xs md:text-sm font-medium">Distribución de Cultivos</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $cultivos->sum('parcelas_count') }}</p>
            </div>
        </div>

        <!-- Tabla de distribución de cultivos -->
        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
            <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">Distribución de Cultivos</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200 text-sm">
                    <thead>
                    <tr class="bg-green-100">
                        <th class="px-4 md:px-6 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">
                            Cultivo
                        </th>
                        <th class="px-4 md:px-6 py-3 text-left font-medium text-gray-700 uppercase tracking-wider">
                            Número de parcelas
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    @foreach($cultivos as $cultivo)
                        <tr class="odd:bg-white even:bg-green-50">
                            <td class="px-4 md:px-6 py-3 font-medium text-gray-800">
                                {{ $cultivo->nombre }}
                            </td>
                            <td class="px-4 md:px-6 py-3 text-gray-700">
                                {{ $cultivo->parcelas_count }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gráfico de distribución de cultivos -->
        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
            <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">Gráfico de Cultivos</h2>
            <canvas id="cultivosChart" class="w-full h-48 md:h-64"></canvas>
        </div>

    </main>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('cultivosChart').getContext('2d');
        const cultivosChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($cultivos->pluck('nombre')),
                datasets: [{
                    label: 'Parcelas por Cultivo',
                    data: @json($cultivos->pluck('parcelas_count')),
                    backgroundColor: [
                        '#34D399', '#10B981', '#059669', '#047857',
                        '#065F46', '#064E3B', '#D9F99D', '#A7F3D0'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</x-layout>
