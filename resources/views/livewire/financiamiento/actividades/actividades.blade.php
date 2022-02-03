<div>

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden {{-- shadow --}}  sm:rounded-lg ">
        <div class="mt-6 grid grid-cols-4 gap-6">
            <div class="col-span-4 sm:col-span-2">

                <canvas id="finanzasDeptomatActividades"></canvas>

<br>
                <br><hr>
                <br>


                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            <input wire:model.debounce.300ms="searchTerm" type="text"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Buscar Actividad">
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <div>
                                <div class="mt-1">
                                    &emsp;
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="sm:col-span-1">

                        <dt class="text-sm font-medium text-gray-500">

                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">

                        </dd>

                    </div>
                </dl>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            @foreach ($data['encabezado'] as $index => $encabezado)
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $encabezado }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Odd row -->
                                        @forelse ($data['myArray'] as $row)
                                            <tr class="bg-white">
                                                @foreach ($row as $index => $content)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {!! $content !!}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                No hay cursos registrados.
                                            </td>
                                        @endforelse

                                        <!-- Even row -->


                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                                <div class="sm:col-span-1">

                                    <dt class="text-sm font-medium text-gray-500">
                                        {{-- Mostrando {{ $items->firstItem() }} a {{ $items->lastItem() }} de un total de
                        {{ $items->total() }}
                        elementos --}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $data['myArray']->links() }}

                                    </dd>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <div class="col-span-4 sm:col-span-2">
            
                <ul class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">
                    <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                        <div class="sm:flex sm:justify-between sm:items-baseline">
                            <h3 class="text-base font-medium">
                                <span class="text-gray-900">Resumen de Finanzas en </span>
                                <span class="text-gray-600">Actividades</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                <time datetime="2021-01-27T16:35"> &emsp;</time>
                            </p>
                        </div>
                        <div class="mt-4 space-y-6 text-sm text-gray-800">
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Selecciona un período</label>
                                <select id="periodo" name="periodo" wire:model="periodoSelected" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                  <option value=''>Todos los Años </option>
                                  @foreach ($data['anosFinanciadosArray'] as $ano)
                                  <option value="{{$ano}}">{{$ano}}</option>    
                                  @endforeach
                                </select>
                              </div>
                            <p>
                                En esta tabla se consideraron se consideraron solamente los últimos 10 años. Para asignar el año a alguna actividad se consideró la fecha de inicio de esta, es decir, si una actividad comenzó en Diciembre del año 2015 y terminó en Febrero del año 2016, se considerará como una actividad del año 2015. Actividades con aporte del Departamento sin fecha de inicio asignada <strong>no</strong> están siendo consideradas en este gráfico.
                            </p>
                            <p>
                                Para un análisis más completo puedes revisar las otras pestañas.
                            </p>
                            <p>
                                <strong style="font-weight: 600;">Monto total aún no asignado: </strong>
                                <strong class="text-red-900"> {{$data['dineroSinAsignar']}} </strong> <span class="text-gray-600">(dineros en donde las actividades designadas no tienen fecha de comienzo registrada)</span>
                            </p>
                        </div>
                    </li>
                   
                </ul>
            
            
            </div>
        </div>
    </div>

    {{-- Gráfico de las finanzas --}}
    <script>
        var ctx = document.getElementById('finanzasDeptomatActividades').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {{--[{!! $data['anosFinanciados'] !!}]--}}, // responsible for how many bars are gonna show on the chart
                // create 12 datasets, since we have 12 items
                // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
                // put 0, if there is no data for the particular bar
                datasets: [{
                    label: 'Monto Invertido',
                    data: [{!! $data['financiamientoPorAno'] !!}],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Gastos en los últimos 10 años'
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


</div>
