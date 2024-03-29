<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['academica']->nombre }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/actividadacademica/{{ $data['academica']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Actividad
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
                    {{-- <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
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
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Tipo
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->tipo }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Participación
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->participacion }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Inicio
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->fecha_comienzo }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Término
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->fecha_termino }}
                </dd>
            </div>

            {{--<div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Institución que financia el proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->institucion_financiadora->nombre }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Monto Financiado
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->montofinanciado }}
                </dd>
            </div>--}}

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Comentarios
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['academica']->comentarios }}
                </dd>
            </div>



            <div class="sm:col-span-1">
                {{-- <dt class="text-sm font-medium text-gray-500">
              Salary
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              $145,000
            </dd> --}}
            </div>

            <div class="sm:col-span-1">
                {{-- <dt class="text-sm font-medium text-gray-500">
              Birthday
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              June 8, 1990
            </dd> --}}
            </div>

            <div class="sm:col-span-2">
                {{-- <dt class="text-sm font-medium text-gray-500">
              About
            </dt>
            <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">
              <p>
                Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.
              </p>
              <p>
                Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.
              </p>
            </dd> --}}
            </div>
        </dl>
    </div>

    {{--  --}}

    <hr>

    <div>
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <a href="#"
                            class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page" onclick="openCity(event, 'London')">
                            Participantes
                        </a>

                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Tokyo')">
                            Proyectos
                        </a>
                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Seul')">
                            Instituciones Financiadoras
                        </a>
                        <a href="#"
                            class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            onclick="openCity(event, 'Shanghai')">
                            Viajes
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div>
            <!-- Datos Personales -->
            <div id="London" class="tabcontent active" style="display: block">
                <?php $edit = $data['academica']->id;
                $type = 1; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.participantesactividad',['edit'=>$edit, 'type' =>$type])


            </div>



            {{-- Formación --}}

            <div id="Tokyo" class="tabcontent ">

                <?php $edit = $data['academica']->id;
                $type = 1; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.proyectosactividad',['edit'=>$edit, 'type' =>$type])

            </div>

            <div id="Seul" class="tabcontent ">

                <?php $edit = $data['academica']->id;
                $type = 1; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.institucionesactividad',['edit'=>$edit, 'type' =>$type])

            </div>
            <div id="Shanghai" class="tabcontent ">

                <?php $edit = $data['academica']->id;
                $type = 1; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.viajesactividad',['edit'=>$edit, 'type' =>$type])

            </div>
        </div>
    </div>


    <br><br>

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
