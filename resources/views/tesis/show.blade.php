<x-app-layout>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {!! $data['tesis']->titulo !!}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
          Share
        </button> --}}
            <a href="/tesis/{{ $data['tesis']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Tesis
                </button>
            </a>

        </div>
    </div>


   


    <div>
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <a href="#"
                            class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page" >
                            Datos de la Tesis
                        </a>

                        {{-- <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Paris')">
                            Datos Académicos
                        </a>

                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Tokyo')">
                            Formación
                        </a> --}}
                    </nav>
                </div>
            </div>
        </div>




        <div>
            <!-- Datos Personales -->
            <div id="London" class="active" style="display: block">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Autor
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['tesis']->leAutor()->full_nameLink() !!}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Tutor(es):
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                Tutor(a):

                                {!! $data['tesis']->tutor_de_la_tesis->full_nameLink() !!}. Cotutores: {!! $data['tesis']->cotutores_de_la_tesis() !!}.


                            </dd>
                        </div>



                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Programa de la Tesis
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['tesis']->programa->nombre }}.
                                {{ $data['tesis']->programa->institucion->nombre }}.
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                Fecha de Defensa
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['tesis']->fechaDefensa }}
                            </dd>

                        </div>


                        @if (isset($data['tesisInterna']))


                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Fecha de Proyecto de Tesis
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['tesisInterna']->fechaProyecto }}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Estado de la Tesis
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['tesisInterna']->estado }}
                                </dd>
                            </div>
                        @endif

                </div>
            </div>

            <br>
            <hr>
            <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex-1 min-w-0">
                    <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                        Investigación
                    </h2>
                </div>
            </div>
            
            <div class="mt-6 sm:mt-2 2xl:mt-5">
                <div class="border-b border-gray-200">
                    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a href="#" onclick="openCity(event, 'NewYork')"
                                class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                aria-current="page">
                                Proyectos asociados
                            </a>
                            <a href="#" onclick="openCity(event, 'NewJersey')"
                class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Artículos
            </a>
{{--                <a href="#" onclick="openState(event, 'Texas')"
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
            <?php $filtro = [
                'tipo' => 'tesis',
                'id' => $data['tesis']->id,
            ]; ?>
            <div id="NewYork" class="tabcontent active" style="display: block">
                @livewire('tablas.filtroproyectos',['filtro'=>$filtro])
            </div>


            <div id="NewJersey" class="tabcontent " >
                @livewire('tablas.filtroarticulos',['filtro'=>$filtro])
            </div>

            {{-- TABS DEL PERFIL --}}

            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
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
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }

            </style>

            











</x-app-layout>
