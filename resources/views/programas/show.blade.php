<x-app-layout>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['programa']->nombre }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
          Share
        </button> --}}
            <a href="/programas/{{ $data['programa']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Programa
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
                            Datos del Programa
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
            <div id="London" class="tabcontent active" style="display: block">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Institución
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['programa']->institucion->full_nameLink() !!}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                País
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['programa']->institucion->pais }}
                            </dd>

                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Grado
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['programa']->grado }}
                            </dd>
                        </div>
                        {{-- 
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

                        </div> --}}
                    </dl>
                </div>
            </div>

            {{-- Datos Académicos --}}
            {{-- <div id="Paris" class="tabcontent ">
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
            </div> --}}
            {{-- Formación --}}
            {{-- <div id="Tokyo" class="tabcontent ">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>

                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>

                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>

                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                &emsp;
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                &emsp;
                            </dd>

                        </div>
                    </dl>
                </div>

            </div> --}}
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













</x-app-layout>
