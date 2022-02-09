<div>
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
                <p>
                    En esta tabla se consideraron se consideraron solamente los últimos 10 años. Para
                    asignar el año a alguna actividad se consideró la fecha de inicio de esta, es decir, si
                    una actividad comenzó en Diciembre del año 2015 y terminó en Febrero del año 2016, se
                    considerará como una actividad del año 2015. Actividades con aporte del Departamento sin
                    fecha de inicio asignada <strong>no</strong> están siendo consideradas en este gráfico.
                </p>
                <p>
                    Para un análisis más completo puedes revisar las otras pestañas.
                </p>
                <p>
                    <strong style="font-weight: 600;">Monto total aún no asignado: </strong>
                    <strong class="text-red-900"> {{ $data['dineroSinAsignar'] }} </strong> <span
                        class="text-gray-600">(dineros en donde las actividades designadas no tienen fecha
                        de comienzo registrada)</span>
                </p>
            </div>
        </li>

        <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
            <div class="sm:flex sm:justify-between sm:items-baseline">
                <h3 class="text-base font-medium">
                    <span class="text-gray-900">Resumen de </span>
                    <span class="text-gray-600">Gastos</span>
                </h3>
                <a href="#" class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                    <button type="button"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar
                    </button>
                    {{-- <time datetime="2021-01-27T16:35"> hola</time> --}}
                </a>
            </div>
            <br>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Año
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            &emsp;
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Monto
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Odd row -->
                                    @foreach ($data['anosFinanciadosArray'] as $item)
                                        <tr class="bg-white">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                &emsp;
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $data['financiamientoPorAnoArray'][$item] }}
                                            </td>
                                        </tr>
                                    @endforeach




                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-4 space-y-6 text-sm text-gray-800">
                <p>
                    &emsp;
                </p>
                <p>
                    &emsp;
                </p>
            </div>
        </li>

    </ul>
</div>