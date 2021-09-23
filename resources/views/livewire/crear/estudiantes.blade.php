<div>

    <form action="{{ route('estudiantes.store') }}" method="POST">


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Selecciona el Programa</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <p>
                    Aquí puedes agregar múltiples estudiantes a un único programa que no estén ingresados a la base de datos
                </p>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <select name="programa"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        required>

                        <option value="">-- Selecciona Programa --</option>

                        @foreach ($allProgramas as $persona)
                            <option value="{{ $persona->id }}">
                                {{ $persona->nombre }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Inicio de Actividades</label>
                        <input type="date" name="comienzo" id="intervalo_paginas" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Término de Actividades (puedes dejarlo en blanco si no lo ha terminado aún)</label>
                        <input type="date" name="termino" id="issue" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>


                </div>



            </div>
        </div>


        {{-- Investigadores --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    &emsp;
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>

        {{-- Investigador Responsable --}}

        



        {{-- Coinvestigadores --}}
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Nuevos Estudiantes
                </h2>
            </div>
        </div>


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    </h2>

                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                @foreach ($participantes['extraparticipantes'] as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">


                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Primer
                                Nombre</label>
                            <input type="text" name="estudiante[{{ $index }}][primer_nombre]"
                                autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                required>
                        </div>
                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                            <input type="text" name="estudiante[{{ $index }}][segundo_nombre]"
                                autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Primer
                                Apellido</label>
                            <input type="text" name="estudiante[{{ $index }}][primer_apellido]"
                                autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                required>
                        </div>
                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                            <input type="text" name="estudiante[{{ $index }}][segundo_apellido]"
                                autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div class="col-span-4 sm:col-span-1 center">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Rut (sin puntos y con
                                guión)</label>
                            <input type="text" name="estudiante[{{ $index }}][rut]"
                                autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                placeholder="17463234-0"
                                required>
                        </div>
                        
                        {{-- <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Fecha de la Participación</label>
                                <input type="date" 
                                 name="extraParticipante[{{ $index }}][2]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >
                            </div>

                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Descripción de Participación</label>
                                <input type="text" 
                                 name="extraParticipante[{{ $index }}][3]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >
                            </div> --}}




                        <div class="col-span-4 sm:col-span-2">

                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <a href="#" wire:click.prevent="removeRow({{ $index }},'extraparticipantes')">
                                <button type="submit"
                                    class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                    Borrar
                                </button>
                            </a>
                        </div>

                    </div>
                    &emsp;
                    <hr>
                @endforeach
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <button wire:click.prevent="addRow('extraparticipantes')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Estudiante</button>
                    </div>
                </div>


            </div>
        </div>

<br><br><br>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Añadir Estudiantes
            </button>
        </div>
</div>
</form>

</div>
