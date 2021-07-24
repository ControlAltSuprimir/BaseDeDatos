<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                ¡Hola {{ Auth::user()->name }}!
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

        </div>
    </div>
    <br><br>

    {{-- Grid List --}}

    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Estadísticas</h2>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                    AR
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="/articulos" class="text-gray-900 font-medium hover:text-gray-600">Artículos</a>
                        <p class="text-gray-500">{{ $data['estadisticas']['articulos'] }} Publicados</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md">
                    EQ
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="/academicos" class="text-gray-900 font-medium hover:text-gray-600">Equipo</a>
                        <p class="text-gray-500">{{ $data['estadisticas']['academicos'] }} Académicos</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-yellow-500 text-white text-sm font-medium rounded-l-md">
                    PR
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="/proyectos" class="text-gray-900 font-medium hover:text-gray-600">Proyectos</a>
                        <p class="text-gray-500">{{ $data['estadisticas']['proyectos'] }} Adjudicados</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-green-500 text-white text-sm font-medium rounded-l-md">
                    LP
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="/coloquios" class="text-gray-900 font-medium hover:text-gray-600">Coloquios Las
                            Palmeras</a>
                        <p class="text-gray-500">{{ $data['estadisticas']['coloquios'] }} realizados</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <br><br>
    <hr>
    {{-- Graph de Artículos --}}


    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

        <div>

            <div class="mt-6 grid grid-cols-4 gap-6">
                <div class="col-span-4 sm:col-span-2">
                    <canvas id="myChart3"></canvas>
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
                                    Se utilizó el criterio de Fondecyt para clasificar a las revistas científicas,
                                    aquellas
                                    en el grupo "Sin Calificar" corresponden a aquelas que fueron publicadas en revistas
                                    que
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
                                    <span class="text-gray-900">Análisis detallado de artículos</span>
                                    <a href="/graficos/articulos"><span class="text-red-900">aquí</span></a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                    <time datetime="2021-01-27T16:35"> &emsp;</time>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


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
    <br>
    <br>
    <hr>





    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

        <div>

            <div class="mt-6 grid grid-cols-4 gap-6">
                <div class="col-span-4 sm:col-span-2">
                    <canvas id="myChartProyectos"></canvas>
                </div>
                <div class="col-span-4 sm:col-span-2">
                    <ul class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">
                        <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                            <div class="sm:flex sm:justify-between sm:items-baseline">
                                <h3 class="text-base font-medium">
                                    <span class="text-gray-900">Proyectos</span>
                                    <span class="text-gray-600">Adjudicados</span>
                                    <span class="text-gray-900">y</span>
                                    <span class="text-gray-600">Activos</span>
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                    <time datetime="2021-01-27T16:35"> &emsp;</time>
                                </p>
                            </div>
                            <div class="mt-4 space-y-6 text-sm text-gray-800">
                                <p>
                                    El eje izquierdo corresponde a los Proyectos Adjudicados, mientras que el derecho
                                    muestra la cantidad de Proyectos Activos cada año.
                                </p>
                                <p>
                                    <a href="/proyectos" class="text-red-900">Aquí</a>  puedes ver la Lista de Todos los proyectos (si en el proyecto no se han
                                    especificado las fechas de inicio de actividades no se considerará en el gráfico).
                                </p>
                            </div>
                        </li>
                        <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                            <div class="sm:flex sm:justify-between sm:items-baseline">
                                <h3 class="text-base font-medium">
                                    <span class="text-gray-900">Análisis detallado de proyectos</span>
                                    <span class="text-red-900">en construcción</span>
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                    <time datetime="2021-01-27T16:35"> &emsp;</time>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChartProyectos').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{!! $data['anosPublicados'] !!}], // responsible for how many bars are gonna show on the chart
                // create 12 datasets, since we have 12 items
                // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
                // put 0, if there is no data for the particular bar
                datasets: [{
                    label: 'Adjudicados',
                    data: [{!! $data['charProyectosPorAno'] !!}],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    yAxisID: 'y',
                }, {
                    label: 'Activos',
                    data: [{!! $data['charProyectosActivosPorAno'] !!}],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    yAxisID: 'y1',
                }]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Proyectos'
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        ticks: {
                          beginAtZero: true
                      },
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        ticks: {
                          beginAtZero: true
                      },
                        // grid line settings
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    },
                }
            },
        });
    </script>










</x-app-layout>
