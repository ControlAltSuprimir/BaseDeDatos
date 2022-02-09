<div>

    <form action="/formularioviaje" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">


            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">&emsp;</p>
                </div>

                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">

                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <div wire:ignore>
                        <select name="academico" id="academicos"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                            <option value="">-- Selecciona Académico/a --</option>

                            @foreach ($allAcademicos as $academico)
                                <option value="{{ $academico->persona->id }}">
                                    {{ $academico->persona->full_name() }}
                                  
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <hr>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">País Origen (*)</label>
                        <input type="text" name="pais_origen" id="pais_origen" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Ciudad Origen (*)</label>
                        <input type="text" name="ciudad_origen" id="ciudad_origen" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">País Destino (*)</label>
                        <input type="text" name="pais_destino" id="pais_destino" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Ciudad Destino
                            (*)</label>
                        <input type="text" name="ciudad_destino" id="ciudad_destino" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                            <span>Fecha de Partida (*)</span>
                            <!-- Heroicon name: solid/question-mark-circle -->

                        </label>
                        <input type="date" name="fecha" id="fecha_partida" autocomplete="cc-csc"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                            <span>Fecha de Aproximada de Regreso</span>
                            <!-- Heroicon name: solid/question-mark-circle -->

                        </label>
                        <input type="date" name="fecha_regreso" id="fecha" autocomplete="cc-csc"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <h2>Financiamiento</h2>
                <p class="mt-1 text-sm text-gray-500">Sólo ingresar información si existe financiamiento</p>
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <label for="email_address" class="block text-sm font-medium text-gray-700">Proyecto
                            Asociado</label>
                        <div wire:ignore>
                            <select name="proyecto" id="proyecto" 
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Proyecto --</option>

                                @foreach ($allProyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}">
                                        {{ $proyecto->full_name() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                            <span>Monto financiado</span>
                            <!-- Heroicon name: solid/question-mark-circle -->

                        </label>
                        <input type="number" name="contribucionfinanciera" id="fecha" autocomplete="cc-csc"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="0">
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <label for="email_address" class="block text-sm font-medium text-gray-700">Institución Asociada</label>
                        <div wire:ignore>
                            <select name="institucion" id="institucion"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Proyecto --</option>

                                @foreach ($allInstituciones as $institucion)
                                    <option value="{{ $institucion->id }}">
                                        {{ $institucion->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                            <span>Monto financiado</span>
                            <!-- Heroicon name: solid/question-mark-circle -->

                        </label>
                        <input type="number" name="contribucionfinancierainstitucion" id="fecha" autocomplete="cc-csc"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="0">
                    </div>
                </div>
                <br>
                <hr><br>
                <h2>Otros</h2>
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-4">

                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Comentarios</label>
                        <textarea id="comentarios" name="comentarios" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                            maxlength="2000"></textarea>

                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                @csrf
                <button type="submit"
                    class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Enviar
                </button>
            </div>
        </div>
    </form>
    <script>
        $(function() {
            $('#academicos').select2();
            $('#proyecto').select2();
            $('#institucion').select2();
        });
    </script>

</div>
