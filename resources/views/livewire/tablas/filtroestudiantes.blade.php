<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    @if ($filtro['estado']=='estudiante')
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    <input wire:model.debounce.300ms="search" type="text"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Buscar Estudiantes">
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
    <br>
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
    @elseif($filtro['estado']=='exestudiante')
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    <input wire:model.debounce.300ms="search" type="text"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Buscar Ex- Estudiantes">
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
    <br>
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
