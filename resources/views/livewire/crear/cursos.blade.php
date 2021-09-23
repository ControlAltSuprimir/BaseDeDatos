<div>

    <form action="{{ route('cursos.store') }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información del
                        Curso</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="titulo" id="expiration_date" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" required>
                </div>
                <br>

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Institución</label>
                    <select id="institucion" name="institucion" name="state"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allInstituciones as $institucion)
                            @if ($institucion->id == 1)
                                <option value="{{ $institucion->id }}" selected>
                                    {{ $institucion->nombre }}
                                </option>
                            @else
                                <option value="{{ $institucion->id }}">
                                    {{ $institucion->nombre }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Código</label>
                        <input type="text" name="codigo" id="codigo" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nivel</label>
                        <input type="text" name="nivel" id="nivel" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="Pregrado, Postgrado, ...">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Año</label>
                        <input type="number" name="ano" id="ano" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Período</label>
                        <input type="text" name="periodo" id="periodo" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="Primer Semestre, Segundo Semestre, ...">
                    </div>


                    <style>
                        input:checked~.dot {
                            transform: translateX(100%);
                            background-color: #48bb78;
                        }

                    </style>







                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                        <label for="toogleA" class="flex items-center cursor-pointer">
                            <!-- label -->

                            <div class="ml-3 text-gray-700 font-medium">
                                ¿Está en U-Cursos? &emsp;
                            </div>
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input type='hidden' value='0' name='ucursos'>
                                <input id="toogleA" type="checkbox" class="sr-only" name="ucursos" value=1 />
                                <!-- line -->
                                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div
                                    class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition">
                                </div>
                            </div>

                        </label>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">URL del Curso</label>
                        <input type="text" name="url" id="url" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">URL del programa</label>
                        <input type="text" name="programa" id="programa" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Número aproximado de
                            alumnos</label>
                        <input type="number" name="alumnos" id="alumnos" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Resumen
                        </label>
                        <textarea id="resumen" name="resumen" value="observaciones" rows="3"
                            class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Comentarios
                        </label>
                        <textarea id="comentarios" name="comentarios" value="observaciones" rows="3"
                            class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>




                </div>



            </div>
        </div>



        {{--  --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Docentes
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>


                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe Docente(s)
                        Responsable(s)</label>
                    <select id="profe" name="docentes[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allPersonas as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->full_name() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>


                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Ayudante(s)</label>
                    <select id="profe2" name="ayudantes[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allPersonas as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->full_name() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>


                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Expositor(a) Invitado(a)</label>
                    <select id="profe3" name="invitados[]" multiple="multiple"
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

        <br><br>

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Estudiantes
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>


                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Estudiantes</label>
                    <select id="estudiantes" name="estudiantes[]" multiple="multiple"
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

        <hr>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Añadir Curso
            </button>
        </div>
    </form>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
        $(function() {
            //Initialize Select2 Elements
            $('#selectAutor0').select2()
        });
        $(document).ready(function() {
            $('#project').select2();
        });
        $(document).ready(function() {
            $('#profe').select2();
            $('#profe2').select2();
            $('#profe3').select2();
            $('#estudiantes').select2();
        });
        $(document).ready(function() {
            $('#institucion').select2();
        });
    </script>

</div>
