<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Clasificación de Artículos
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

        </div>
    </div>

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

        <div class="mt-6 grid grid-cols-4 gap-6">
            <div class="col-span-4 sm:col-span-1">
                <canvas id="myChart"></canvas>
            </div>


            <div class="col-span-4 sm:col-span-1">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="col-span-4 sm:col-span-2">
                <ul class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">
                    <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                        <div class="sm:flex sm:justify-between sm:items-baseline">
                            <h3 class="text-base font-medium">
                                <span class="text-gray-900">Criterio de la</span>
                                <span class="text-gray-600">Clasificación</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                <time datetime="2021-01-27T16:35"> &emsp;</time>
                            </p>
                        </div>
                        <div class="mt-4 space-y-6 text-sm text-gray-800">
                            <p>
                                Se utilizó el criterio de Fondecyt para clasificar a las revistas científicas, aquellas
                                en el grupo "Sin Calificar" corresponden a aquelas que fueron publicadas en revistas que
                                no aparecen en la lista Oficial de Fondecyt (Si el artículo aún no se encuentra
                                publicado, no aparecerá en esta gráfica).
                            </p>
                            <p>
                                En este enlace puedes ver las <a href="/revistas" class="text-red-900">Revistas
                                    Calificadas por Fondecyt</a>.
                            </p>
                            <p>
                                <strong style="font-weight: 600;">Artículos pendientes de Publicación:</strong>
                                {{ $data['articulosPendientes'] }} <a href="/articulos?noPublicados=true"
                                    class="text-red-900"> Ver </a>
                            </p>
                        </div>
                    </li>
                    <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                        <div class="sm:flex sm:justify-between sm:items-baseline">
                            <h3 class="text-base font-medium">
                                <span class="text-gray-900">Respecto al año</span>
                                <span class="text-gray-600">{{ $data['anoActual'] }}</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                <time datetime="2021-01-27T16:35"> &emsp;</time>
                            </p>
                        </div>
                        <div class="mt-4 space-y-6 text-sm text-gray-800">
                            <p>
                                No se incluyen las publicaciones del año {{ $data['anoActual'] }} debido a que aún no
                                se
                                encuentra terminado y dañaría la comparación de los períodos
                                {{ $data['anoActual'] - 12 }}-{{ $data['anoActual'] - 7 }} y
                                {{ $data['anoActual'] - 6 }}-{{ $data['anoActual'] - 1 }}.
                            </p>
                            <p>
                                De todos modos, hasta este momento el año {{ $data['anoActual'] }} tiene la siguientes
                                calificaciones:
                            </p>
                            <p>
                                MB: {{ $data['clasificacionActual']['MB'] }} / B:
                                {{ $data['clasificacionActual']['B'] }} / R:
                                {{ $data['clasificacionActual']['R'] }} /
                                Sin
                                Calificar: {{ $data['clasificacionActual']['Sin Calificar'] }}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <br><br>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['MB', 'B', 'R', 'Sin Calificar'],
                datasets: [{
                    label: '# of Votes',
                    data: [{!! $data['chart']['MB'] !!}, {!! $data['chart']['B'] !!}, {!! $data['chart']['R'] !!},
                        {!! $data['chart']['Sin Calificar'] !!}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Período {{ $data['anoActual'] - 6 }}-{{ $data['anoActual'] - 1 }}'
                    }
                }
            },
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['MB', 'B', 'R', 'Sin Calificar'],
                datasets: [{
                    label: '# of Votes',
                    data: [{!! $data['chart2']['MB'] !!}, {!! $data['chart2']['B'] !!}, {!! $data['chart2']['R'] !!},
                        {!! $data['chart2']['Sin Calificar'] !!}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Período {{ $data['anoActual'] - 12 }}-{{ $data['anoActual'] - 7 }}'
                    }
                }
            },
        });
    </script>



    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

        <div class="mt-6 grid grid-cols-4 gap-6">
            <div class="col-span-4 sm:col-span-2">
                <canvas id="myChart3"></canvas>
            </div>
            <div class="col-span-4 sm:col-span-2">
                <ul class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">
                    <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                        <div class="sm:flex sm:justify-between sm:items-baseline">
                            <h3 class="text-base font-medium">
                                <span class="text-gray-900">Análisis de</span>
                                <span class="text-gray-600">Publicaciones</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                <time datetime="2021-01-27T16:35"> &emsp;</time>
                            </p>
                        </div>
                        <div class="mt-4 space-y-6 text-sm text-gray-800">
                            <p>
                                No hay suficientes datos para hacer un análisis
                            </p>
                            {{-- <p>
                                    Se utilizó el criterio de Fondecyt para clasificar a las revistas científicas, aquellas
                                    en el grupo "Sin Calificar" corresponden a aquelas que fueron publicadas en revistas que
                                    no aparecen en la lista Oficial de Fondecyt (Si el artículo aún no se encuentra
                                    publicado, no aparecerá en esta gráfica).
                                </p> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{{$data['chartPorAno']['Sin Calificar']}}
    
    <script>
        var ctx = document.getElementById('myChart3').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [{!! $data['anosPublicados'] !!}], // responsible for how many bars are gonna show on the chart
                // create 12 datasets, since we have 12 items
                // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
                // put 0, if there is no data for the particular bar
                datasets: [{
                    label: 'Sin Calificar',
                    data: [{!! $data['chartPorAno']['Sin Calificar'] !!}],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'R',
                    data: [{!! $data['chartPorAno']['R'] !!}],
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'B',
                    data: [{!! $data['chartPorAno']['B'] !!}],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'MB',
                    data: [{!! $data['chartPorAno']['MB'] !!}],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Publicaciones por Año'
                    },
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>













</x-app-layout>
