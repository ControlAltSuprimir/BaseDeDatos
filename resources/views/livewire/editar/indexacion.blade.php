<div>

    <section aria-labelledby="payment_details_heading">
        <form action="{{ route('indexaciones.update', $edit) }}" method="POST">

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                            Información Principal</h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre de la
                                Indexación</label>
                            <input type="text" name="nombre" id="first_name" autocomplete="cc-given-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                value="{{ $perfil->nombre }}">
                        </div>




                    </div>
                </div>

                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">

                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    @csrf

                    @method('PUT')
                    <button type="submit"
                        class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Actualizar Indexación
                    </button>
                </div>
            </div>
        </form>
    </section>



    {{--
    <form action="{{ route('articulos.update', $perfil) }}" method="post">








        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Revistas
                        Asociadas
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    

                </div>


                @foreach ($orderProducts as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                    
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

                                        </option>
                                    @endforeach
                            </select>

                @endif



                </select>
            </div>


            <div class="col-span-4 sm:col-span-2">


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
                    class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Añadir
                    Autor</button>
            </div>
        </div>







        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Actualizar Indexación
            </button>
        </div>

    </form>
    --}}

</div>
