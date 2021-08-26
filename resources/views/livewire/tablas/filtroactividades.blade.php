<div>
    @if ($data->count()==0)
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
        Sin actividades registradas
            </div>
        </dl>
    </div>
    <br><br>
    @else

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th wire:click="sortBy('titulo')"  scope="col"
                        class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tipo
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Viaje Asociado
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Odd row -->
                @foreach ($data as $item)
                    <tr class="bg-white">
                        <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                           <a href="{!! $item['link'] !!}">{!! $item['nombre'] !!}</a>  
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {!! $item['tipo'] !!}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {!! $item['fecha'] !!}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="/viajes/{{$item['id_viaje']}}">{!! $item['viaje'] !!}</a> 
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="sm:col-span-1">

            <dt class="text-sm font-medium text-gray-500">
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data->links() }}

            </dd>

        </div>

    </div>
    @endif
</div>
