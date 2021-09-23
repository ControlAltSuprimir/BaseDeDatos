<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    @if ($filtro['estado']=='estudiante')
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Ingreso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{--Código--}}
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{--Fecha Participación--}}
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Odd row -->
            @foreach ($items as $item)
                <tr class="bg-white">
                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {!! $item->full_nameLink() !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item->pivot->fecha_comienzo !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{--<?php echo date("Y-m-d");?> {!! $item['codigo'] !!}--}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{--{!! $item['fecha'] !!}--}}
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @elseif($filtro['estado']=='exestudiantes')
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Ingreso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Término
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    &emsp;
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Odd row -->
            @foreach ($items as $item)
                <tr class="bg-white">
                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {!! $item->full_nameLink() !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item->pivot->fecha_comienzo !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item->pivot->fecha_termino !!}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{--{!! $item['fecha'] !!}--}}
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @endif
</div>
<div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="sm:col-span-1">

        <dt class="text-sm font-medium text-gray-500">
        </dt>
        <dd class="mt-1 text-sm text-gray-900">
            {{ $items->links() }}

        </dd>

    </div>

</div>
