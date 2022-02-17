<div>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">

            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                Share
              </button> --}}
            {{-- <button type="button" wire:click.prevent="create"
                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                Añadir Viaje
            </button> --}}

        </div>
    </div>
    <!-- Pinned projects -->

    <!-- Projects list (only on smallest breakpoint) -->

    {{--  --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Title
                        </th> --}}
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Origen / Destino
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{-- Contribución Financiera --}}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>



                        <tbody>
                            @forelse ($products as $product)
                                <!-- Odd row -->
                                {{-- @foreach ($data['personas'] as $persona) --}}
                                <tr class="bg-white">
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                                        <a
                                            href="/personas/{{ $product->elViaje->persona->id }}">{{ $product->elViaje->persona->full_name() }}</a>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->elViaje->name() }}
                                        {{-- {!! $product->elProyecto->responsable->full_nameLink() !!} --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                        <a
                                            href="/viajes/{{ $product->id_viaje }}"> VER VIAJE </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900"
                                            wire:click.prevent="delete({{ $product->id }})"
                                            onclick="confirm('Vas a Eliminar esta formación ¿Estás Seguro(a)?') || event.stopImmediatePropagation()">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                        Viajes no encontrados
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">

                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">

                                    </td>
                                </tr>
                            @endforelse

                            <!-- Even row -->


                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <div
        class="@if (!$showModal) hidden @endif flex items-center
        justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
        <div class="bg-white rounded-lg w-1/2">
            <form wire:submit.prevent="save" class="w-full">

                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full border-b pb-4">
                        <div class="text-gray-900 font-medium text-lg">
                            {{ $productId ? 'Editar Institución Involucrado' : 'Añadir Institución Involucrada' }}
                        </div>
                        <svg wire:click="close" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white py-6 px-4 sm:p-6">
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">
                            Viaje
                        </label>

                        
                            <select wire:model.defer="product.id_viaje"
                                class="select2 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona el Viaje --</option>

                                @foreach ($allViajes as $viaje)
                                    <option value="{{ $viaje->id }}">
                                        {{ $viaje->name() }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <script>
                        $(function() {
                            //Initialize Select2 Elements
                            $('.select2').select2()
                        });
                    </script>
                    <br>



                    <div class="mt-6 grid grid-cols-4 gap-6">


                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Escribe el monto
                                aportado a la actividad</label>
                            <input type="number" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                wire:model.defer="product.contribucion_financiera">
                        </div>
                    </div>
                    <br>

                    <div class="col-span-4 sm:col-span-2">

                    </div>






                </div>

                <div class="flex flex-col items-start p-4">
                    <div class="ml-auto">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">{{ $productId ? 'Guardar Cambios' : 'Guardar' }}
                        </button>
                        <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded" wire:click="close"
                            type="button" data-dismiss="modal">Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>










</div>
