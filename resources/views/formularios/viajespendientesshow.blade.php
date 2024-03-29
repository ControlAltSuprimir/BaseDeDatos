<x-app-layout>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                @if ($data['pendiente']->procesado)
                    Formulario de Viaje Procesado (autorizado el {{ $data['pendiente']->updated_at }})
                @elseif($data['pendiente']->rechazado)
                    Formulario de Viaje Rechazado (rechazado el {{ $data['pendiente']->updated_at }})
                @else
                    Viaje Pendiente
                @endif

            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

        </div>
    </div>


    <div>

        <div>
            <!-- Datos Personales -->
            <div id="London" class="tabcontent active" style="display: block">
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">
                                Académico
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $data['pendiente']->persona->full_name() }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Partida
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['pendiente']->fecha !!}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Posible Retorno
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['pendiente']->retorno_aproximado !!}
                            </dd>
                        </div>


                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Origen
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['pendiente']->pais_origen !!}, {!! $data['pendiente']->ciudad_origen !!}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">

                            <dt class="text-sm font-medium text-gray-500">
                                Destino
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {!! $data['pendiente']->ciudad_destino !!}, {!! $data['pendiente']->ciudad_destino !!}
                            </dd>

                        </div>
                    </dl>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <h2>Financiación</h2>
                    <br>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                        @if (isset($data['pendiente']->id_proyecto))
                            <div class="sm:col-span-1">

                                <dt class="text-sm font-medium text-gray-500">
                                    Proyecto Asociado
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <a href="/proyectos/{{ $data['pendiente']->id_proyecto }}"
                                        class=" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500">
                                        {{ $data['pendiente']->proyecto->titulo }}
                                    </a>
                                </dd>

                            </div>
                            <div class="sm:col-span-1">

                                <dt class="text-sm font-medium text-gray-500">
                                    Monto
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['pendiente']->contribucionfinanciera }}
                                </dd>

                            </div>
                        @endif
                        @if (isset($data['pendiente']->id_institucion))
                            <div class="sm:col-span-1">

                                <dt class="text-sm font-medium text-gray-500">
                                    Institución Financiadora
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['pendiente']->institucion->nombre }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">

                                <dt class="text-sm font-medium text-gray-500">
                                    Monto
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['pendiente']->contribucionfinancierainstitucion }}
                                </dd>

                            </div>
                        @endif

                    </dl>
                    @if (isset($data['pendiente']->comentarios))
                        <br>
                        <br>
                        <hr>
                        <br>
                        <h2>Comentarios</h2>
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">
                                    &emsp;
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $data['pendiente']->comentarios }}
                                </dd>

                            </div>
                        </dl>
                    @endif


                </div>
            </div>
            <br>
            <hr>
            @if ($data['pendiente']->procesado)
                <div
                    class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">

                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            &emsp;
                        </h1>
                    </div>

                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
                        <a href="/viajes/{{ $data['pendiente']->id_viaje }}">
                            <button type="button"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                Ver Viaje registrado
                            </button>
                        </a>

                    </div>

                </div>
            @else
                <?php
                $rol = auth()
                    ->user()
                    ->rol->first();
                ?>
                @if ($rol->rol == 'Admin')
                    @if (!$data['pendiente']->rechazado)
                        <div
                            class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">

                            <div class="flex-1 min-w-0">
                                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                    &emsp;
                                </h1>
                            </div>

                            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                                <?php $edit = $data['pendiente']->id; ?>





                                <a href="/viajespendientes/{{ $data['pendiente']->id }}/process">
                                    <button type="button"
                                        class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                        Procesar
                                    </button>
                                </a>

                            </div>

                        </div>

                        @livewire('borrar.borrar_viajependiente',['edit' =>$edit])
                    @endif
                @endif

            @endif


        </div>
    </div>





</x-app-layout>
