<x-app-layout>
    <!-- Page title & actions -->




    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Financiamientos de Actividades Académicas y de Extensión
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                    Share
                  </button> --}}
            {{-- <a href="/articulos/create">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Añadir Artículo
                </button>
            </a> --}}
        </div>
    </div>

    <div>


        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <a href="#" onclick="openCountry(event, 'Japan')"
                            class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            General
                        </a>

                        <a href="#" onclick="openCountry(event, 'Chile')"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Actividades
                        </a>

                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCountry(event, 'England')">
                            Personas
                        </a>

                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCountry(event, 'France')">
                            Otros
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div>
            <!-- Datos Personales -->
            <div id="Japan" class="tabcontent active" style="display: block">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{-- Debo agregar 3/4 componentes para evitar que se molesten entre ellos y evitar que el servidor sufra mucho --}}

                    <div>

                        <div
                            class="mt-8 bg-white dark:bg-gray-800 overflow-hidden {{-- shadow --}}  sm:rounded-lg ">
                            <div class="mt-6 grid grid-cols-4 gap-6">
                                <div class="col-span-4 sm:col-span-2">

                                    @livewire('financiamiento.actividades.resumenestadistico',['filtro' => 'graph'])
                                    <br>
                                    <br>
                                    <hr>
                                    <br>
                                    @livewire('financiamiento.actividades.tablaactividades',['ano' => ''])
                                </div>

                                <div class="col-span-4 sm:col-span-2">

                                    @livewire('financiamiento.actividades.resumenestadistico',['filtro' => 'nograph'])
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @livewire('financiamiento.actividades.resumenestadistico',['tipo' => 'graph']) --}}
                    {{-- @livewire('financiamiento.actividades.general') --}}
                </div>
            </div>
            <div id="Chile" class="tabcontent ">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                    @livewire('financiamiento.actividades.actividades')
                </div>
            </div>
            <div id="England" class="tabcontent ">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- @livewire('tablas.filtrocursos',['filtro'=>$filtro]) --}}
                </div>
            </div>

            <div id="France" class="tabcontent ">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- @livewire('tablas.filtrocursos',['filtro'=>$filtro]) --}}
                </div>
            </div>
        </div>






        <script>
            function openCountry(evt, cityName) {
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
    </div>




</x-app-layout>
