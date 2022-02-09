<div>

    <form action="{{ route('actividadextension.update', $edit) }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de
                        la Actividad</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" value="{{ $perfil->nombre }}" required>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <input type="text" name="tipo" id="tipo" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="coloquio, seminario, ..." value="{{ $perfil->tipo }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Número de
                            Participantes</label>
                        <input type="number" name="numeroParticipantes" id="numeroParticipantes"
                            autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="50" value="{{ $perfil->numeroParticipantes }}">
                    </div>




                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700"> Fecha Inicio</label>
                        <input type="date" name="fecha_comienzo" id="fecha_comienzo" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->fecha_comienzo }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Fecha Término</label>
                        <input type="date" name="fecha_termino" id="fecha_termino" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->fecha_termino }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Público Objetivo</label>
                        <input type="text" name="publicoObjetivo" id="publicoObjetivo" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="" value="{{ $perfil->publicoObjetivo }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Descripción de la
                            Actividad</label>
                        <textarea id="about" name="comentarios" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $perfil->comentarios }}</textarea>

                    </div>



                </div>



            </div>
        </div>



        {{--  --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Participantes
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">{{-- Una vez guardada la actividad podrás asignar viajes a los participantes (en caso de que existan) --}}</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    {{-- <div class="col-span-4 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Indexación</label>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700"> Acción</label>
                    </div> --}}

                </div>
                <div wire:ignore>
                    <label for="proyectos" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Nombre de Participante(s)</label>
                    <select id="location" name="participantes[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allPersonas as $persona)

                            @if (in_array($persona->id, $participantes))
                                <option value="{{ $persona->id }}" selected>
                                    {{ $persona->full_name() }}
                                </option>
                            @else
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endif

                        @endforeach
                    </select>
                </div>




            </div>
        </div>

        <hr>


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Proyectos
                        Asociados
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">{{-- Una vez guardada la actividad podrás asignar viajes a los participantes (en caso de que existan) --}}</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                <div wire:ignore>
                    <label for="proyectos" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Proyecto(s) (Código o Nombre)</label>
                    <select id="project" name="proyectos[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allProyectos as $proyecto)

                            @if (in_array($proyecto->id, $proyectos))
                                <option value="{{ $proyecto->id }}" selected>
                                    {{ $proyecto->full_name() }}
                                </option>
                            @else
                                <option value="{{ $proyecto->id }}">
                                    {{ $proyecto->full_name() }}
                                </option>
                            @endif

                        @endforeach
                    </select>
                </div>





            </div>
        </div>

        <hr>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Instituciones Financiadoras
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"> Una vez guardada la actividad podrás asignar financiamientos
                        correspondientes (en caso de que existan). En caso de que seleccione "Otra", usted podrá dar
                        especificaciones más tarde.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">

                </div>

                <div wire:ignore>
                    <label for="proyectos" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Institución(es)</label>
                    <select id="institutions" name="instituciones[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">

                        @foreach ($allFinanciadoras as $financiadora)

                            @if (in_array($financiadora->id, $instituciones))
                                <option value="{{ $financiadora->id }}" selected>
                                    {{ $financiadora->nombre }}
                                </option>
                            @else
                                <option value="{{ $financiadora->id }}">
                                    {{ $financiadora->nombre }}
                                </option>
                            @endif
                        @endforeach

                    </select>
                </div>
                


            </div>
        </div>
        <hr>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Viajes Asociados
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"> El viaje debe ser agregado separadamente del(de la)
                        participante.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">

                </div>

                <div wire:ignore>
                    <label for="proyectos" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Viaje(s)</label>
                    <select id="viajes" name="viajes[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">

                        @foreach ($allViajes as $viaje)
                            @if (in_array($viaje->id, $viajes))
                                <option value="{{ $viaje->id }}" selected>
                                    {{ $viaje->full_name() }}
                                </option>
                            @else
                                <option value="{{ $viaje->id }}">
                                    {{ $viaje->full_name() }}
                                </option>

                            @endif
                        @endforeach


                    </select>
                </div>


            </div>
        </div>






        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Editar Actividad de Extensión
            </button>
        </div>

    </form>

    <script>
        $(document).ready(function() {
            $('#project').select2();
            $('#location').select2();
            $('#institutions').select2();
            $('#viajes').select2();
        });
    </script>

</div>
