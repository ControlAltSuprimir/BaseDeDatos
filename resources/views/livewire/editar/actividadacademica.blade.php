<div>

    <form action="{{ route('actividadacademica.update', $edit) }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de
                        la Actividad</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" value="{{ $perfil->nombre }}" required>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <input type="text" name="tipo" id="tipo" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="coloquio, seminario, ..." value="{{ $perfil->tipo }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Número de
                            Participantes</label>
                        <input type="text" name="numeroParticipantes" id="numeroParticipantes"
                            autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="50 personas" value="{{ $perfil->numeroParticipantes }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Público Objetivo</label>
                        <input type="text" name="publicoObjetivo" id="publicoObjetivo" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="" value="{{ $perfil->publicoObjetivo }}">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Financiamiento</label>
                        <input type="text" name="financiamiento" id="financiamiento" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="" value="{{ $perfil->financiamento }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700"> Fecha Inicio</label>
                        <input type="date" name="fecha_comienzo" id="fecha_comienzo" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->fecha_comienzo }}">
                    </div>
                    
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Fecha Término</label>
                        <input type="date" name="fecha_termino" id="fecha_termino" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->fecha_termino }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Descripción de la
                            Actividad</label>
                        <textarea id="about" name="comentarios" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                            {{ $perfil->comentarios }}
                        </textarea>

                    </div>



                </div>



            </div>
        </div>



        {{--  --}}


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Participantes
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">{{-- Una vez guardada la actividad podrás asignar viajes a los participantes (en caso de que existan) --}}</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    {{-- <div class="col-span-4 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Indexación</label>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700"> Acción</label>
                    </div> --}}

                </div>
                @foreach ($participantes as $index => $participante)
                    {{-- <?php echo print_r($participantes[$index]); ?> --}}
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <select name="personas[{{ $index }}]['id']" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                                wire:model="participantes.{{ $index }}.select"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Participante -- </option>
                                @foreach ($allPersonas as $persona)
                                    <option value="{{ $persona->id }}">
                                        {{ $persona->full_name() }}
                                    </option>
                                @endforeach

                            </select>
                        </div>



                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Descripción de la
                                Participación</label>
                            <input type="text" name="personas[{{ $index }}]['cargo']"
                                id="personas[{{ $index }}]['id']['cargo']" autocomplete="cc-family-name"
                                wire:model="participantes.{{ $index }}.cargo"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Viaje
                                Asociado</label>
                            <select name="personas[{{ $index }}]['viaje']" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                                wire:model="participantes.{{ $index }}.viaje"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Participante -- </option>
                                @foreach ($allViajes as $viaje)
                                    <option value="{{ $viaje->id }}">
                                        {{ $viaje->full_name() }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700"> &emsp; </label>
                            <a href="#" wire:click.prevent="removeItem({{ $index }},'participantes')">
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
                        <button wire:click.prevent="addItem('participantes')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Participante</button>
                    </div>
                </div>




            </div>
        </div>

        <hr>


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Proyectos
                        Asociados
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">{{-- Una vez guardada la actividad podrás asignar viajes a los participantes (en caso de que existan) --}}</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                @foreach ($proyectos as $index => $proyecto)

                    <div class="col-span-4 sm:col-span-2 center">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                        <select name="proyectos[{{ $index }}]['id']" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                            wire:model="proyectos.{{ $index }}"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            <option value="">-- Selecciona Proyecto -- </option>

                            @foreach ($allProyectos as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->full_name() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">

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
                            Añadir Proyecto</button>
                    </div>
                </div>




            </div>
        </div>





        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Editar Actividad Académica
            </button>
        </div>
</div>
</form>

</div>
