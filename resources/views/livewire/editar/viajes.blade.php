<div>
    <form action="{{ route('viajes.update',$perfil->id) }}" method="POST">

        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment_details_heading">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Asigna el
                            Viaje
                            a un Académico
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                    </div>


                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <select name="persona" id="academico"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                            <option value="">-- Selecciona al Académico --</option>

                            @foreach ($allAcademicos as $academico)
                                <option value="{{ $academico->id }}" <?php echo $academico->id_Persona == $perfil->id_persona ? 'selected' : ''; ?>>
                                    {{ $academico->persona->full_name() }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                                Detalles del Viaje</h2>
                            <p class="mt-1 text-sm text-gray-500"></p>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-4 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">País
                                    Origen</label>
                                <input type="text" name="paisOrigen" id="first_name" autocomplete="cc-given-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    value="{{ $perfil->paisOrigen }}">
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Ciudad
                                    Origen</label>
                                <input type="text" name="ciudadOrigen" id="last_name" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    value="{{ $perfil->ciudadOrigen }}">
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="email_address" class="block text-sm font-medium text-gray-700">País
                                    Destino</label>
                                <input type="text" name="paisDestino" id="email_address" autocomplete="email"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    value="{{ $perfil->paisDestino }}">
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="expiration_date" class="block text-sm font-medium text-gray-700">Ciudad
                                    Destino</label>
                                <input type="text" name="ciudadDestino" id="expiration_date" autocomplete="cc-exp"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    placeholder="" value="{{ $perfil->ciudadDestino }}">
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Fecha del
                                    Viaje</label>
                                <input type="date" name="fecha" id="first_name" autocomplete="cc-given-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    value="{{ $perfil->fecha }}">
                            </div>
                            <div class="col-span-4 sm:col-span-2">
                                <label for="last_name"
                                    class="block text-sm font-medium text-gray-700">Comentarios</label>
                                <textarea id="comentarios" name="comentarios" rows="3"
                                    class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                    maxlength="2000">{{ $perfil->comentarios }}</textarea>
                            </div>


                        </div>
                    </div>

                </div>

            </section>

        </div>
        <br>


        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment_details_heading">
                <div
                    class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Información de Financiamiento y/o relación con Proyectos
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">

                    </div>
                </div>


                {{-- Proyectos --}}


                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                                Proyectos
                            </h2>
                            <p class="mt-1 text-sm text-gray-500"></p>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">


                        </div>
                        <div wire:ignore>
                            <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                                el Proyecto</label>
                            <select id="proyectos" name="proyectos[]" multiple="multiple"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($allProyectos as $proyecto)
                                    @if (in_array($proyecto->id, $proyectos))
                                        <option value="{{ $proyecto->id }}" selected>
                                            {{ $proyecto->titulo }}
                                        </option>
                                    @else
                                        <option value="{{ $proyecto->id }}">
                                            {{ $proyecto->titulo }}
                                        </option>
                                    @endif
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
                                Institución(es)
                            </h2>
                            <p class="mt-1 text-sm text-gray-500"></p>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">


                        </div>
                        <div wire:ignore>
                            <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                                la Institución</label>
                            <select id="instituciones" name="instituciones[]" multiple="multiple"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($allInstituciones as $persona)
                                    @if (in_array($persona->id, $instituciones))
                                    <option value="{{ $persona->id }}" selected>
                                        {{ $persona->nombre }}
                                    </option>
                                    @else
                                    <option value="{{ $persona->id }}">
                                        {{ $persona->nombre }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>



                    </div>
                </div>
            </section>

        </div>
        <br>


        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment_details_heading">
                <div
                    class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
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
                            <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                                Artículo</label>
                            <select id="academicas" name="academicas[]" multiple="multiple"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($allAcademicas as $persona)
                                    @if (in_array($persona->id, $academicas))
                                    <option value="{{ $persona->id }}" selected>
                                        {{ $persona->nombre }}
                                    </option>
                                    @else
                                    <option value="{{ $persona->id }}">
                                        {{ $persona->nombre }}
                                    </option>
                                    @endif
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
                            <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                                Artículo</label>
                            <select id="extension" name="extension[]" multiple="multiple"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($allExtensiones as $persona)
                                    @if (in_array($persona->id, $extensiones))
                                    <option value="{{ $persona->id }}" selected>
                                        {{ $persona->nombre }}
                                    </option>
                                    @else
                                    <option value="{{ $persona->id }}">
                                        {{ $persona->nombre }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>



                    </div>
                </div>
            </section>

        </div>

        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <section aria-labelledby="payment_details_heading">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Editar Viaje
                        </button>
                    </div>
                </div>
            </section>

        </div>

    </form>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('#academico').select2()
        });
        $(document).ready(function() {
            $('#location').select2();
            $('#instituciones').select2();
            $('#proyectos').select2();
            $('#academicas').select2();
            $('#extension').select2();
        });
    </script>

</div>
