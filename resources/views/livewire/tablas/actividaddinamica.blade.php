<div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    {{--<input wire:model.debounce.300ms="search" type="text"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Buscar Actividad">
                        --}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <div>
                        <div class="mt-1">

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
    </div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th style="cursor: pointer;" scope="col"
                                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha Comienzo-Término
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Odd row -->
                            @foreach ($items as $item)
                                <tr class="bg-white">
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <a class="whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500" href="/actividadacademica/{{$item['id']}}" >{{ $item['nombre'] }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item['tipo'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item['intervalo'] }}
                                    </td>
                                    <td scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </td>
                                </tr>
                            @endforeach

                            <!-- Even row -->


                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">



                </div>
            </div>
        </div>


    </div>



</div>
