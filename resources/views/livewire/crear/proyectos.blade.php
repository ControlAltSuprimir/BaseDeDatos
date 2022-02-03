<div>

    <form action="{{ route('proyectos.store') }}" method="POST">


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información del
                        Proyecto</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título del
                        Proyecto</label>
                    <input type="text" name="titulo" id="expiration_date" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" required>
                </div>


                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Monto Adjudicado</label>
                        <input type="text" name="monto_adjudicado" id="DOI" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Código del
                            Proyecto</label>
                        <input type="text" name="codigo_proyecto" id="fecha" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Inicio del
                            Proyecto</label>
                        <input type="date" name="comienzo" id="intervalo_paginas" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Término del
                            Proyecto</label>
                        <input type="date" name="termino" id="issue" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Área</label>
                        <input type="text" name="area" id="volumen" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Tipo Proyecto</label>
                        <input type="text" name="tipo_proyecto" id="tipo_proyecto" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Organización que
                            financia</label>
                        <input type="text" name="organizacion_financia" id="organizacion_financia"
                            autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Observaciones</label>
                        <textarea id="about" name="observaciones" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>

                    </div>



                </div>



            </div>
        </div>


        {{-- Investigadores --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Participantes del Proyecto
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>

        {{-- Investigador Responsable --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Investigador
                        Responsable</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>


                <div wire:ignore>
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                            Investigador Responsable</label>
                        <select name="investigador_responsable"
                            class="select2 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                            <option value="" selected>-- Ninguna --</option>

                            @foreach ($allPersonas as $revista)
                                <option value="{{ $revista->id }}">
                                    {{ $revista->full_name() }}
                                    {{-- (${{ number_format($product->price, 2) }}) --}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>



        {{-- Coinvestigadores --}}

        <div>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                            Miembros del Equipo
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">


                    </div>
                    <div wire:ignore>
                        <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                            autor(a)</label>
                        <select id="location" name="participantes[]" multiple="multiple"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @foreach ($allPersonas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                </div>
            </div>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    


                </div>
            </div>

        </div>



        {{-- Investigaciones Asociadas --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Investigaciones Asociadas
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>


        {{-- Actividades --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Artículos
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Artículo</label>
                    <select id="articles" name="articulos[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allArticulos as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


            </div>
        </div>


        {{-- Tesis --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Tesis
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Artículo</label>
                    <select id="tesis" name="tesis[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allTesis as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


            </div>
        </div>


        {{-- Titulo actividades --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Actividades Asociadas
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>


        {{-- Académicas --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Actividades Académicas
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe Artículo</label>
                    <select id="academicas" name="academicas[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allAcademica as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


            </div>
        </div>

        {{-- Extensión --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Actividad de Extension
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe Artículo</label>
                    <select id="extension" name="extension[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allExtension as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


            </div>
        </div>




        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Añadir Proyecto
            </button>
        </div>
</div>
</form>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $(document).ready(function() {
        $('#location').select2();
        $('#articles').select2();
        $('#tesis').select2();
        $('#academicas').select2();
        $('#extension').select2();
    });
</script>

</div>
