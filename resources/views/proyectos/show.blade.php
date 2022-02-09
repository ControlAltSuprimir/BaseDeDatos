<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['proyecto']->titulo }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/proyectos/{{ $data['proyecto']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Proyecto
                </button>
            </a>

        </div>
    </div>


    <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#"
                        class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Perfil
                    </a>
                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Artículos
              </a>

              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a> --}}
                </nav>
            </div>
        </div>
    </div>

    <!-- Description list -->
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Investigador Responsable
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {!! $data['proyecto']->responsable->full_name() !!}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Tipo Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->tipo_proyecto }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Organización que Financia
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->organizacion_financia }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Fecha Inicio
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->comienzo }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Fecha Término
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->termino }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Monto Adjudicado
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->monto_adjudicado }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Código del Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->codigo_proyecto }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Área de Investigación
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->area }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    {{-- Organización que Financia --}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{-- {{ $data['proyecto']->organizacion_financia }} --}}
                </dd>

            </div>
            <hr>

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Descripción del Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->descripcion }}
                </dd>
            </div>


        </dl>
    </div>
    <br><br>
    <hr>

    <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#"
                        class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Participantes Relacionados
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <?php $edit = $data['proyecto']->id; ?>


    @livewire('tablas.participantes',['edit' => $edit])

    <br><br>
    <hr>
    <br>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Investigación Asociada
            </h2>
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
                        Artículos
                    </a>
                    <a href="#" onclick="openState(event, 'NewJersey')"
                        class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Tesis
                    </a>
                    {{-- <a href="#" onclick="openState(event, 'Texas')"
                                class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Coloquios
                            </a> --}}

                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Formación
                      </a> --}}
                </nav>
            </div>
        </div>
    </div>
    <div id="NewYork" class="tabcontent3 active" style="display: block">
        @if (count($data['articulos']) != 0)



            <!-- Description list -->
            <div class="mt-6 max-w-12xl mx-auto px-0 sm:px-6 lg:px-0">

                <table class="table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                                class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Título

                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Autores
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Revista
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado Publicación
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Odd row -->
                        @foreach ($data['articulos'] as $articulo)
                            <tr class="bg-white">
                                <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {!! $articulo->tituloLink() !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {!! $articulo->autoresCompact() !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $articulo->revista->nombre }}
                                </td>
                                <td scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $articulo->estado_publicacion }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        @else
            <div class="mt-6 sm:mt-2 2xl:mt-5">
                <div class="border-b border-gray-200">
                    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                            <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                aria-current="page">No hay Artículos Relacionados</div>


                        </nav>
                    </div>
                </div>
            </div>

        @endif
    </div>
    <div id="NewJersey" class="tabcontent3 ">

        @if (count($data['tesis']) != 0)


            <!-- Description list -->
            <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <table class="table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Título

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Autor
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tutor(es)
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha Defensa
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Odd row -->
                            @foreach ($data['tesis'] as $tesis)
                                <tr class="bg-white">
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {!! $tesis->full_nameLink() !!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {!! $tesis->leAutor()->full_nameLink() !!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {!! $tesis->cotutores_de_la_tesis() !!}
                                    </td>
                                    <td scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $tesis->fechaDefensa }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </dl>
            </div>
        @else
            <div class="mt-6 sm:mt-2 2xl:mt-5">
                <div class="border-b border-gray-200">
                    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                            <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                aria-current="page">No hay Tesis Relacionados</div>


                        </nav>
                    </div>
                </div>
            </div>

        @endif
    </div>
    <br>
    <br><br>
    <hr>
    <br>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Actividades Asociadas
            </h2>
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
                        Actividades
                    </a>
                    {{--
                    <a href="#" onclick="openState(event, 'NewJersey')"
                        class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Tesis
                    </a>--}}
                    {{-- <a href="#" onclick="openState(event, 'Texas')"
                                class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Coloquios
                            </a> --}}

                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Formación
                      </a> --}}
                </nav>
            </div>
        </div>
    </div>
    <div id="NewYork" class="tabcontent3 active" style="display: block">
        <?php 
        $identity = $data['proyecto']->id; 
        $type = 'proyecto';?>
        @livewire('tablas.actividaddinamica',['identity' => $identity, 'type' => $type])
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
