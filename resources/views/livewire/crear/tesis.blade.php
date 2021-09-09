<form action="{{ route('tesis.store') }}" method="POST">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información
                    de la Tesis</h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>
            <div class="col-span-4 sm:col-span-1" gap-6>
                <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="expiration_date" autocomplete="cc-exp"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    placeholder="" required>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
                <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Fecha de
                        Defensa</label>
                    <input type="date" name="fechaDefensa" id="fechaDefensa" autocomplete="cc-given-name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                </div>



                <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">
                        Fecha de Proyecto
                    </label>
                    <input type="date" name="fechaProyecto" id="fechaProyecto" autocomplete="cc-given-name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">
                        Estado
                    </label>
                    <input type="text" name="estado" id="estado" autocomplete="cc-family-name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="En proceso, Final ...">
                </div>

                <div class="col-span-4 sm:col-span-2">
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Resumen de la Tesis
                    </label>
                    <textarea id="resumen" name="resumen" value="resumen" rows="3"
                        class=" shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                    {{-- <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p> --}}

                </div>
                <div class="col-span-4 sm:col-span-2">
                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Observaciones
                    </label>
                    <textarea id="observaciones" name="observaciones" value="observaciones" rows="3"
                        class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                    {{-- <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p> --}}

                </div>


            </div>



        </div>
    </div>


    {{-- Autor --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Autor(a) de la Tesis
                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            <div class="col-span-4 sm:col-span-1" gap-6>
                <select name="autor" id="autor" {{-- wire:model="programaSeleccionado" --}}
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                    <option value="">-- Selecciona la Persona --</option>

                    @foreach ($allPersonas as $persona)
                        <option value="{{ $persona->id }}">
                            {{ $persona->full_name() }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>


    {{-- Tutor --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Tutor(a) de la Tesis
                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            <div class="col-span-4 sm:col-span-1" gap-6>
                <select name="tutor" id="tutor" {{-- wire:model="programaSeleccionado" --}}
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                    <option value="">-- Selecciona la Persona --</option>

                    @foreach ($allPersonas as $persona)
                        <option value="{{ $persona->id }}">
                            {{ $persona->full_name() }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>


    {{-- Cotutor --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Cotutores de la Tesis

                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            @foreach ($cotutores as $index => $orderProduct)
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2 center">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                        <select name="cotutores[{{ $index }}]" wire:model="cotutores.{{ $index }}"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="">-- Selecciona la Persona -- </option>

                            @foreach ($allPersonas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}

                        <a href="#" wire:click.prevent="removeItem({{ $index }},'cotutores')">
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
                    <button wire:click.prevent="addItem('cotutores')"
                        class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Añadir Cotutor
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Programa --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Programa Asociado
                </h2>
                <p class="mt-1 text-sm text-gray-500">Si el programa no está en la base de datos, agrégalo <a
                        class="text-red-800" href="/programas/create"> aquí </a>.</p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            <div class="col-span-4 sm:col-span-1" gap-6>
                <select name="programa" id="programa" wire:model="programaSeleccionado"
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                    <option value="">-- Selecciona el Programa --</option>

                    @foreach ($allProgramas as $programa)
                        <option value="{{ $programa->id }}">
                            {{ $programa->nombre }}. {{ $programa->institucion->nombre }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>


    {{-- Comisión --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Jurado de la Tesis

                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            @foreach ($comision as $index => $orderProduct)
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2 center">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                        <select name="comision[{{ $index }}]" wire:model="comision.{{ $index }}"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="">-- Selecciona la Persona -- </option>

                            @foreach ($allPersonas as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}

                        <a href="#" wire:click.prevent="removeItem({{ $index }},'comision')">
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
                    <button wire:click.prevent="addItem('comision')"
                        class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Añadir Miembro de Comisión
                    </button>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- Articulos --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Artículos relacionados con la Tesis

                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            @foreach ($articulos as $index => $orderProduct)
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2 center">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                        <select name="articulos[{{ $index }}]" wire:model="articulos.{{ $index }}"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="">-- Selecciona el Artículo -- </option>

                            @foreach ($allArticulos as $articulo)
                                <option value="{{ $articulo->id }}">
                                    {{ $articulo->titulo }}. Autores: {{ $articulo->autoresNoLink() }}.
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}

                        <a href="#" wire:click.prevent="removeItem({{ $index }},'articulos')">
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
                    <button wire:click.prevent="addItem('articulos')"
                        class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Añadir Artículos
                    </button>
                </div>
            </div>
        </div>
    </div>



    <hr>
    {{-- Proyectos --}}

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Proyectos relacionados con la Tesis

                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            @foreach ($proyectos as $index => $orderProduct)
                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2 center">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                        <select name="proyectos[{{ $index }}]" wire:model="proyectos.{{ $index }}"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="">-- Selecciona el Proyecto -- </option>

                            @foreach ($allProyectos as $proyecto)
                                <option value="{{ $proyecto->id }}">
                                    {{ $proyecto->full_name() }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}

                        <a href="#" wire:click.prevent="removeItem({{ $index }},'proyectos')">
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
                    <button wire:click.prevent="addItem('proyectos')"
                        class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Añadir Proyecto
                    </button>
                </div>
            </div>
        </div>
    </div>



    <hr>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        @csrf
        <button type="submit"
            class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
            Añadir Tesis
        </button>
    </div>

</form>
