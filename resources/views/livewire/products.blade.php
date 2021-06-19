<div>

    <form action="{{ route('revistas.store') }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de
                        la Revista</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Nombre de la
                        Revista</label>
                    <input type="text" name="nombre" id="expiration_date" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" required>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Alias</label>
                        <input type="text" name="alias" id="alias" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">ISSN</label>
                        <input type="text" name="ISSN" id="last_name" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>
                </div>



            </div>
        </div>

        {{--  --}}
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <style>
                input:checked~.dot {
                    transform: translateX(100%);
                    background-color: #48bb78;
                }

            </style>

            {{-- <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                ¿Está indexada por Fondecyt?
            </div> --}}


            <div class="bg-white py-6 px-4 sm:p-6">

                <div class="col-span-4 sm:col-span-2">
                    <label for="toogleA" class="flex items-center cursor-pointer">
                        <!-- label -->

                        <div class="ml-3 text-gray-700 font-medium">
                            ¿Está indexada por Fondecyt? &emsp;
                        </div>
                        <!-- toggle -->
                        <div class="relative">
                            <!-- input -->
                            <input id="toogleA" type="checkbox" class="sr-only" name="Fondecyt" value=1 />
                            <!-- line -->
                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                            <!-- dot -->
                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition">
                            </div>
                        </div>

                    </label>

                </div>



                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Calificación Fondecyt
                            (puedes dejar en blanco si no lo sabes o no está indexada por Fondecyt)</label>
                        <input type="text" name="clasificacion_Fondecyt" id="alias" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                    </div>

                    <div class="col-span-4 sm:col-span-2">

                    </div>
                </div>

            </div>


        </div>



        {{--  --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Indexaciones
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
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <select name="indexaciones[{{ $index }}][0]"
                                wire:model="orderProducts.{{ $index }}.product_id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Indexación --</option>

                                @foreach ($allProducts as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->nombre }}
                                        {{-- (${{ number_format($product->price, 2) }}) --}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-4 sm:col-span-2">

                            <label for="last_name" class="block text-sm font-medium text-gray-700">Clasificación Q</label>
                            <input type="text" name="indexaciones[{{ $index }}][1]" id="indexaciones[{{ $index }}][product_id][0]" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">

                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Impact Factor</label>
                            <input type="number" step=".01" name="indexaciones[{{ $index }}][2]" id="indexaciones[{{ $index }}][product_id][0]" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">

                            </a>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Observaciones (en caso de ser no Indexada con o sin referato puede agregar aquí lo que desee)</label>
                            <input type="text" name="indexaciones[{{ $index }}][3]" id="indexaciones[{{ $index }}][product_id][0]" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">

                            </a>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">
                                <SPACER TYPE=VERTICAL SIZE=30>
                            </label>

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
                            Indexación</button>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    @csrf
                    <button type="submit"
                        class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
