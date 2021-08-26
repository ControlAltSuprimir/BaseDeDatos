<x-app-layout>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['academico']->persona->full_name() }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
          Share
        </button> --}}
            <a href="/academicos/{{ $data['academico']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Perfil
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
                            aria-current="page" onclick="openCity(event, 'London')">
                            Datos Personales
                        </a>


                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Paris')">
                            Datos Académicos
                        </a>

                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Tokyo')">
                            Formación
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div>
            <!-- Datos Personales -->
            <div id="London" class="tabcontent active" style="display: block">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->email }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                Rut
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->rut }}
                            </dd>

                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                País de Nacionalidad
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->nacionalidad }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Teléfono de Contacto
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->telefono }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Alias
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->alias }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Fecha de Nacimiento
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->persona->fecha_nacimiento }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                        </div>

                        <div class="sm:col-span-1">

                        </div>

                        <div class="sm:col-span-2">

                        </div>
                    </dl>
                </div>
            </div>

            {{-- Datos Académicos --}}
            <div id="Paris" class="tabcontent ">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Carrera
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->carrera }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                Jerarquía
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->jerarquia }}
                            </dd>

                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Inicio Actividades
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->comienzo }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Término Actividades
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->termino }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Alias
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->oficina }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Teléfono Oficina
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->telefono }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Horas Semanales
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['academico']->horasSemanales }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                        </div>

                        <div class="sm:col-span-2">

                        </div>
                    </dl>
                </div>
            </div>

            {{-- Formación --}}

            <div id="Tokyo" class="tabcontent ">

                <?php $edit = $data['academico']->id_Persona; ?>


                @livewire('tablas.formacion',['edit' => $edit])



            </div>
        </div>
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
    <br><br>

    <hr>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Investigación
            </h2>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">


        </div>
    </div>



    <div>
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a href="#" onclick="openCountry(event, 'Japan')"
                            class="tablinks2 border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">
                            Publicaciones Realizadas
                        </a>
                        <a href="#" onclick="openCountry(event, 'Chile')"
                            class="tablinks2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Proyectos
                        </a>
                        {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a> --}}
                    </nav>
                </div>
            </div>
        </div>
        <?php $filtro = [
            'tipo' => 'persona',
            'id' => $data['academico']->id_Persona,
        ]; ?>
        <div>
            <div id="Japan" class="tabcontent2 active" style="display: block">
                @livewire('tablas.filtroarticulos',['filtro'=>$filtro])
            </div>
            <div id="Chile" class="tabcontent2 ">
                @livewire('tablas.filtroproyectos',['filtro'=>$filtro])
            </div>
        </div>
    </div>




    <script>
        function openCountry(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent2");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks2");
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
        .tabcontent2 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

    </style>




    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Actividades
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
                        Académicas/Extensión
                    </a>
                    <a href="#" onclick="openState(event, 'NewJersey')"
                    class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Viajes
                </a>
                    <a href="#" onclick="openState(event, 'Texas')"
                        class="tablinks3 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Coloquios
                    </a>

                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a> --}}
                </nav>
            </div>
        </div>
    </div>
    <?php $filtroActividades = [
        'tipo' => 'persona',
        'id' => $data['academico']->id_Persona,
    ]; ?>
    <div id="NewYork" class="tabcontent3 active" style="display: block">
        @livewire('tablas.filtroactividades',['filtroActividades'=>$filtroActividades])
    </div>
    <div id="Texas" class="tabcontent3 ">
        
    </div>

    <div id="NewJersey" class="tabcontent3 ">

        @if (isset($data['viajes']))
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Destino
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Financiamiento
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Odd row -->

                    @foreach ($data['viajes'] as $viaje)
                        <tr class="bg-white">
                            <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $viaje->ciudadDestino }}, {{ $viaje->paisDestino }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $viaje->financiamiento }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $viaje->fecha }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                            </td>
                        </tr>
                    @endforeach


                    <!-- Even row -->


                    <!-- More people... -->
                </tbody>
            </table>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <tbody>
                    <tr class="bg-white">
                        <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            No se encontraron Viajes Realizados
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif

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
