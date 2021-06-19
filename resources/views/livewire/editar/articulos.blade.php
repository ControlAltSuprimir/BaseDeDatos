<div>

    <form action="{{ route('articulos.update', $perfil) }}" method="post">

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
                        placeholder="" required value="{{ $perfil->titulo }}">
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">DOI</label>
                        <input type="text" name="DOI" id="DOI" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->DOI }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Año Publicación</label>
                        <input type="number" name="fecha_publicacion" id="fecha" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->fecha_publicacion }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Intervalo de
                            Páginas</label>
                        <input type="text" name="intervalo_paginas" id="intervalo_paginas" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->intervalo_paginas }}">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Issue</label>
                        <input type="text" name="issue" id="issue" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->issue }}">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Volumen</label>
                        <input type="text" name="volumen" id="volumen" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->volumen }}">
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Link del artículo en
                            Arxiv</label>
                        <input type="text" name="arxiv" id="arxiv" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->arxiv }}">
                    </div>



                </div>



            </div>
        </div>



        {{-- AUTORES --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Autores
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    {{-- <div class="col-span-4 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Indexación</label>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700"> Acción</label>
                    </div> --}}

                </div>


                @foreach ($orderProducts as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}
                            <select name="personas[{{ $index }}]"
                                wire:model="orderProducts.{{ $index }}.product_id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">


                                @if (isset($orderProduct['id']))

                                    <option value="{{ $orderProduct['id_Persona'] }}" selected="selected">
                                        {{ $orderProduct['autor'] }}
                                    </option>
                                    @foreach ($allPersonas as $persona)
                                        @if ($persona->id == $orderProduct['id'])

                                        @else
                                            <option value="{{ $persona->id }}">
                                                {{ $persona->full_name() }}

                                            </option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">-- Selecciona Autor -- </option>

                                    @foreach ($allPersonas as $persona)
                                        <option value="{{ $persona->id }}">
                                            {{ $persona->full_name() }}
                                            {{-- (${{ number_format($product->price, 2) }}) --}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            {{-- <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label> --}}

                            <a href="#" wire:click.prevent="removeProduct({{ $index }})">
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
                        <button wire:click.prevent="addProduct"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Autor</button>
                    </div>
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

                <div class="mt-6 grid grid-cols-4 gap-6">
                    {{-- <div class="col-span-4 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Indexación</label>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700"> Acción</label>
                    </div> --}}

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

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <select name="revista" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        @if (isset($perfil->id_Revista))

                            <option value="{{ $perfil->id_Revista }}" selected>{{ $perfil->revista->nombre }}
                            </option>

                            @foreach ($allRevistas as $revista)
                                @if ($revista->id == $perfil->id_Revista)

                                @else
                                    <option value="{{ $revista->id }}">
                                        {{ $revista->nombre }}
                                        {{-- (${{ number_format($product->price, 2) }}) --}}
                                    </option>
                                @endif
                            @endforeach
                        @else
                            <option value="">-- Selecciona la Revista --</option>

                            @foreach ($allRevistas as $revista)
                                <option value="{{ $revista->id }}">
                                    {{ $revista->nombre }}
                                    {{-- (${{ number_format($product->price, 2) }}) --}}
                                </option>
                            @endforeach
                        @endif
                    </select>

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
                        placeholder="" value="{{ $perfil->descripcion }}">
                </div>


            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Editar Artículo
            </button>
        </div>
</div>
</form>

</div>
