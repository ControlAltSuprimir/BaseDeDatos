<div>

    <form action="{{ route('articulos.store') }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información del
                        Artículo</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título del
                        Artículo</label>
                    <input type="text" name="titulo" id="expiration_date" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" required>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">DOI</label>
                        <input type="text" name="DOI" id="DOI" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Año Publicación</label>
                        <input type="number" name="fecha_publicacion" id="fecha" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Intervalo de
                            Páginas</label>
                        <input type="text" name="intervalo_paginas" id="intervalo_paginas" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Issue</label>
                        <input type="text" name="issue" id="issue" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Volumen</label>
                        <input type="text" name="volumen" id="volumen" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Estado
                            Publicación</label>
                        <select name="estadoPublicacion"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="publicado">Publicado</option>
                            <option value="aceptado">Aceptado</option>
                            <option value="enRevision">En Revisión</option>
                            <option value="enPrensa">En Prensa</option>
                        </select>
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Link del artículo en
                            Arxiv</label>
                        <input type="text" name="arxiv" id="arxiv" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>



                </div>



            </div>
        </div>



        {{--  --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Autores
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>


                <div wire:ignore>
                    <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        autor(a)</label>
                    <select id="location" name="personas[]" multiple="multiple"
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
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Si un autor no
                        está en la lista, puedes agregarlo rápido aquí (más tarde puedes editar más detalles de ellos)
                    </h2>

                </div>

               
                @foreach ($extraPersonas as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">

                        {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                            <input type="text" name="extraPersonas[{{ $index }}][0]"
                                id="extraPersonas[{{ $index }}][0]" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                required>
                        </div>
                        <div class="col-span-4 sm:col-span-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Primer
                                Apellido</label>
                            <input type="text" name="extraPersonas[{{ $index }}][1]"
                                id="extraPersonas[{{ $index }}][1]" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                required>
                        </div>




                        <div class="col-span-4 sm:col-span-2">
                            {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <a href="#" wire:click.prevent="removeExtraPersona({{ $index }})">
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
                        <button wire:click.prevent="addExtraPersona"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Añadir
                            otros
                            Autores</button>
                    </div>
                </div>


            </div>
        </div>
        <br><br>

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Proyectos
                        Involucrados
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div wire:ignore>
                    <label for="proyectos" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                        Proyecto (Código o Nombre)</label>
                    <select id="project" name="proyectos[]" multiple="multiple"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($allProyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">
                                {{$proyecto->codigo_proyecto}}: {{ $proyecto->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
{{--
                @foreach ($proyectosInvolucrados as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            <select name="proyectos[{{ $index }}]"
                                wire:model="proyectosInvolucrados.{{ $index }}"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Proyecto -- </option>
                                @foreach ($allProyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}">
                                        {{ $proyecto->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-span-4 sm:col-span-2">

                            <a href="#" wire:click.prevent="removeProduct('proyecto',{{ $index }})">
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
                        <button wire:click.prevent="addProduct('proyecto')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Añadir
                            Proyecto</button>
                    </div>
                </div>
                --}}


            </div>
        </div>
        <hr><br><br>
        {{-- Revista --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Revista
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>
                <div wire:ignore>
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="location" class="block text-sm font-medium text-gray-700">Selecciona/Escribe
                            Revista</label>
                        <select name="revista"
                            class="select2 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="" selected>-- Ninguna --</option>

                            @foreach ($allRevistas as $revista)
                                <option value="{{ $revista->id }}">
                                    {{ $revista->nombre }}
                                    {{-- (${{ number_format($product->price, 2) }}) --}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>

        {{-- Arxiv --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información
                            extra
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                    </div>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700"></label>
                    <input type="text" name="descripcion" id="descripcion" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="">
                </div>


            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Añadir Artículo
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
            $('#location').select2();
        });
    </script>

</div>
