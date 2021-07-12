<div>

    <form action="{{ route('proyectos.update', $perfil->id) }}" method="POST">


        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información del
                        Proyecto</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>
                <div class="col-span-4 sm:col-span-1" gap-6>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título del
                        Proyecto</label>
                    <input type="text" name="titulo" id="expiration_date" autocomplete="cc-exp"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        placeholder="" required value="{{ $perfil->titulo }}">
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Monto Adjudicado</label>
                        <input type="text" name="monto_adjudicado" id="DOI" autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->monto_adjudicado }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Código del
                            Proyecto</label>
                        <input type="text" name="codigo_proyecto" id="fecha" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->codigo_proyecto }}">
                    </div>

                    <div class="col-span-4 sm:col-span-1">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Inicio del
                            Proyecto</label>
                        <input type="date" name="comienzo" id="intervalo_paginas" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->comienzo }}">
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Término del
                            Proyecto</label>
                        <input type="date" name="termino" id="issue" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->termino }}">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Área</label>
                        <input type="text" name="area" id="volumen" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->area }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Tipo Proyecto</label>
                        <input type="text" name="tipo_proyecto" id="tipo_proyecto" autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->tipo_proyecto }}">
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Organización que
                            financia</label>
                        <input type="text" name="organizacion_financia" id="organizacion_financia"
                            autocomplete="cc-family-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->organizacion_financia }}">
                    </div>


                    <div class="col-span-4 sm:col-span-2">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Observaciones</label>
                        <textarea id="about" name="observaciones" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $perfil->descripcion }}</textarea>

                    </div>



                </div>



            </div>
        </div>


        {{-- Investigadores --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Participantes del Proyecto
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>

        {{-- Investigador Responsable --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Investigador
                        Responsable</h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <select name="investigador_responsable" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        {{-- <option value="">-- Selecciona al Investigador Responsable --</option> --}}
                        @foreach ($allPersonas as $persona)
                            @if ($persona->id == $perfil->investigador_responsable)
                                <option value="{{ $perfil->investigador_responsable }}" selected="selected">
                                    {{ $perfil->responsable->full_name() }} </option>
                            @else
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
        </div>



        {{-- Coinvestigadores --}}

        {{-- Coinvestigadores --}}

        <div>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                            Miembros del Equipo
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">


                    </div>
                    @foreach ($participantes['participantes'] as $index => $orderProduct)
                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700"> &emsp;</label>

                                <select name="participantes[{{ $index }}][0]"
                                    wire:model="participantes.participantes.{{ $index }}.id"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    <option value="">-- Selecciona Coinvestigadores -- </option>

                                    @foreach ($allPersonas as $persona)
                                        <option value="{{ $persona->id }}">
                                            {{ $persona->full_name() }}

                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Rol en el Proyeto</label>
                                <input type="text" 
                                wire:model="participantes.participantes.{{ $index }}.rol"
                                 name="participantes[{{ $index }}][1]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    placeholder="Coinvestigador, Colaborador, Patrocinador..."
                                    >
                                    
                            </div>

                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Fecha de la Participación</label>
                                <input type="date" 
                                wire:model="participantes.participantes.{{ $index }}.fecha"
                                 name="participantes[{{ $index }}][2]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >
                            </div>

                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Descripción de Participación</label>
                                <input type="text" 
                                wire:model="participantes.participantes.{{ $index }}.descripcion"
                                 name="participantes[{{ $index }}][3]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    >
                            </div>
                            

                            <div class="col-span-4 sm:col-span-2">


                                {{-- <a href="#" wire:click.prevent="removeProduct({{ $index }})"> --}}
                                <a href="#" wire:click.prevent="removeRow({{ $index }},'participantes')">
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

                            <button wire:click.prevent="addRow('participantes')"
                                class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                Añadir Participante</button>
                        </div>
                    </div>


                </div>
            </div>
            <hr>
            <br>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Si un
                            participante no
                            está en la lista, puedes agregarlo rápido aquí (más tarde puedes editar más detalles de
                            ellos)
                        </h2>

                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">


                    </div>
                    @foreach ($participantes['extraparticipantes'] as $index => $orderProduct)
                        <div class="mt-6 grid grid-cols-4 gap-6">


                            <div class="col-span-4 sm:col-span-1">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Primer
                                    Nombre</label>
                                <input type="text" name="extraParticipante[{{ $index }}]['primer_nombre']"
                                    
                                    autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Primer
                                    Apellido</label>
                                <input type="text" name="extraParticipante[{{ $index }}]['primer_apellido']"
                                    
                                    autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    required>
                            </div>
                            <div class="col-span-4 sm:col-span-2 center">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Rol en el Proyeto</label>
                                <input type="text" 
                                 name="extraParticipante[{{ $index }}][1]" autocomplete="cc-family-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                    placeholder="Coinvestigador, Colaborador, Patrocinador...">
                            </div>

                            <div class="col-span-4 sm:col-span-2 center">
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
                            </div>




                            <div class="col-span-4 sm:col-span-2">

                                <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                                <a href="#"
                                    wire:click.prevent="removeRow({{ $index }},'extraparticipantes')">
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
                                Añadir</button>
                        </div>
                    </div>


                </div>
            </div>

        </div>

      <br>


        {{-- Investigaciones Asociadas --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Investigaciones Asociadas
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>


        {{-- Artículos --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Artículos
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                @foreach ($investigaciones['articulos'] as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>

                            <select name="articulos[{{ $index }}]"
                                wire:model="investigaciones.articulos.{{ $index }}.id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">

                                    <option value="">-- Selecciona Artículo -- </option>

                                    @foreach ($allArticulos as $articulo)
                                        <option value="{{ $articulo->id }}">
                                            {{ $articulo->titulo }}
                                            {{-- (${{ number_format($product->price, 2) }}) --}}
                                        </option>
                                    @endforeach


                            </select>
                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <a href="#" wire:click.prevent="removeRow({{ $index }},'articulos')">
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

                        <button wire:click.prevent="addRow('articulos')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Artículo</button>
                    </div>
                </div>


            </div>
        </div>
        


        {{-- Tesis --}}

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                        Tesis
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">


                </div>
                @foreach ($investigaciones['tesis'] as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>

                            <select name="tesis[{{ $index }}]"
                                wire:model="investigaciones.tesis.{{ $index }}.id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">

                                    <option value="">-- Selecciona Tesis -- </option>

                                    @foreach ($allTesis as $tesis)
                                        <option value="{{ $tesis->id }}">
                                            {{ $tesis->titulo }}
                                            
                                        </option>
                                    @endforeach


                            </select>
                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>
                            <a href="#" wire:click.prevent="removeRow({{ $index }},'tesis')">
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

                        <button wire:click.prevent="addRow('tesis')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Tesis</button>
                    </div>
                </div>


            </div>
        </div>


        {{-- Titulo actividades --}}

        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
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
                @foreach ($actividades['academica'] as $index => $orderProduct)
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>

                            <select name="academica[{{ $index }}]['id']"
                                wire:model="actividades.academica.{{ $index }}.id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Actividad -- </option>

                                @foreach ($allAcademicas as $actividad)
                                    <option value="{{ $actividad->id }}">
                                        {{ $actividad->nombre }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Cargo</label>
                            <input type="text" name="academica[{{ $index }}]['cargo']"
                                id="acadenuca[{{ $index }}]['cargo']" autocomplete="cc-family-name"
                                wire:model="actividades.academica.{{ $index }}.cargo"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            {{--
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Cargo</label>
                            <input type="text" name="extension[{{ $index }}]['cargo']"
                                id="extension[{{ $index }}]['cargo']" autocomplete="cc-family-name"
                                wire:model="actividades.extension.{{ $index }}.cargo"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                --}}
                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <a href="#" wire:click.prevent="removeRow({{ $index }},'academica')">
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
                        <button wire:click.prevent="addRow('academica')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Actividad Académica</button>
                    </div>
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
                @foreach ($actividades['extension'] as $index => $orderProduct)
                <?php //echo json_encode($actividades['extension'][$index]['objeto'], JSON_PRETTY_PRINT);?>
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2 center">

                            <label for="last_name" class="block text-sm font-medium text-gray-700">&emsp;</label>

                            <select name="extension[{{ $index }}]['id']"
                                wire:model="actividades.extension.{{ $index }}.id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">-- Selecciona Tesis -- </option>

                                @foreach ($allExtensiones as $extension)
                                    <option value="{{ $extension->id }}">
                                        {{ $extension->nombre }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Cargo</label>
                            <input type="text" name="extension[{{ $index }}]['cargo']"
                                id="extension[{{ $index }}]['cargo']" autocomplete="cc-family-name"
                                wire:model="actividades.extension.{{ $index }}.cargo"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-2">

                        </div>


                        <div class="col-span-4 sm:col-span-2">
                            <a href="#" wire:click.prevent="removeRow({{ $index }},'extension')">
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
                        <button wire:click.prevent="addRow('extension')"
                            class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Añadir Actividad Extensión</button>
                    </div>
                </div>


            </div>
        </div>




        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Actualizar Proyecto
            </button>
        </div>

    </form>

</div>
