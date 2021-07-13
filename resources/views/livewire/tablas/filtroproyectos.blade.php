<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Título
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Rol en el Proyecto
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Código
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Participación
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Odd row -->
            @foreach ($data as $item)
                <tr class="bg-white">
                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {!! $item['proyecto'] !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item['rol'] !!}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item['codigo'] !!}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {!! $item['fecha'] !!}
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
