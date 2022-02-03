<x-app-layout>
    <!-- Page title & actions -->
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Viajes Pendientes
            </h1>
        </div>

    </div>



    <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#" onclick="openState(event, 'NewYork')"
                        class="tablinks3 border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Pendientes
                    </a>
                    <a href="#" onclick="openState(event, 'NewJersey')"
                        class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Procesadas
                    </a>

                    <a href="#" onclick="openState(event, 'Santiago')"
                        class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Rechazados
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <div id="NewYork" class="tabcontent3 active" style="display: block">

        <br>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th wire:click="sortBy('primer_apellido')" style="cursor: pointer;" scope="col"
                                        class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Académico/a
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ruta
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Odd row -->
                                @foreach ($data['pendientes'] as $pendiente)
                                    <tr class="bg-white">
                                        <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {!! $pendiente->persona->full_name() !!}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {!! $pendiente->persona->email !!}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {!! $pendiente->pais_origen !!}, {!! $pendiente->ciudad_origen !!} -> {!! $pendiente->pais_destino !!},
                                            {!! $pendiente->ciudad_destino !!}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="/viajespendientes/{{ $pendiente->id }}">
                                                DETALLES
                                            </a>
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
                                {{ $data['pendientes']->links() }}

                            </dd>

                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>

    {{--Procesados--}}
    <div id="NewJersey" class="tabcontent3 ">

        <br>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        @if (count($data['procesados']) != 0)

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th wire:click="sortBy('primer_apellido')" style="cursor: pointer;" scope="col"
                                            class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Académico
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ruta
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Odd row -->
                                    @foreach ($data['procesados'] as $pendiente)
                                        <tr class="bg-white">
                                            <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {!! $pendiente->persona->full_name() !!}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {!! $pendiente->persona->email !!}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {!! $pendiente->pais_origen !!}, {!! $pendiente->ciudad_origen !!} ->
                                                {!! $pendiente->pais_destino !!}, {!! $pendiente->ciudad_destino !!}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="/viajespendientes/{{ $pendiente->id }}">
                                                    DETALLES
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            
                        @endif

                    </div>
                    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">

                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['procesados']->links() }}

                            </dd>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>


    {{--Rechazados--}}
    <div id="Santiago" class="tabcontent3">

        <br>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        @if (count($data['rechazados']) != 0)

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th wire:click="sortBy('primer_apellido')" style="cursor: pointer;" scope="col"
                                            class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Académico
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ruta
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Odd row -->
                                    @foreach ($data['rechazados'] as $pendiente)
                                        <tr class="bg-white">
                                            <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {!! $pendiente->persona->full_name() !!}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {!! $pendiente->persona->email !!}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {!! $pendiente->pais_origen !!}, {!! $pendiente->ciudad_origen !!} ->
                                                {!! $pendiente->pais_destino !!}, {!! $pendiente->ciudad_destino !!}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="/viajespendientes/{{ $pendiente->id }}">
                                                    DETALLES
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            
                        @endif

                    </div>
                    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">

                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['procesados']->links() }}

                            </dd>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>






    <script>
        function openState(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent3");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks3");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                tablinks[i].className = tablinks[i].className.replace(
                    " border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm",
                    " border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                );
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className +=
                " border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm";

        }
    </script>



    <style>
        .tabcontent3 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

    </style>






</x-app-layout>
