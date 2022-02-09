<div>


    <div>

        <form action="{{ route('coloquios.update', $perfil->id) }}" method="POST">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                            Información del Coloquio</h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo" autocomplete="cc-exp"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="{{ $perfil->titulo }}" placeholder="" required>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="fecha" id="fecha" autocomplete="cc-given-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                value="{{ $perfil->fecha }}">
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Url en la página
                                del Departamento</label>
                            <input type="text" name="url" id="url" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                value="{{ $perfil->url }}">
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Url en Youtube
                            </label>
                            <input type="text" name="youtube" id="youtube" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                value="{{ $perfil->youtube }}">
                        </div>



                    </div>
                    <div class="col-span-4 py-6 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Resumen de la
                            Charla</label>
                        <textarea id="abstract" name="abstract" rows="3"
                            class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                  {{ $perfil->abstract }}
                </textarea>
                    </div>




                </div>
            </div>


            {{-- Expositor --}}

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Nombre
                            del/a Expositor/a
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                    </div>

                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <div wire:ignore>


                            <div class="col-span-4 sm:col-span-1" gap-6>
                                <select name="expositor"
                                    class="select2 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    @if (isset($perfil->id_persona))
                                        <option value="{{ $perfil->id_persona }}" selected>
                                            {{ $expositor->full_name() }}
                                        </option>
    
                                        @foreach ($allPersonas as $persona)
                                            @if ($persona->id == $perfil->id_persona)
    
                                            @else
                                                <option value="{{ $persona->id }}">
                                                    {{ $persona->full_name() }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="" selected>-- Selecciona la Revista --</option>
    
                                        @foreach ($allPersonas as $persona)
                                            <option value="{{ $persona->id }}">
                                                {{ $persona->fullname() }}
                                                {{-- (${{ number_format($product->price, 2) }}) --}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
    
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Institución --}}

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                            Institución del/la Expositor/a
                        </h2>
                        <p class="mt-1 text-sm text-gray-500">Si la institución no se encuentra en la base de datos,
                            debes agregarla primero <a href="/instituciones/create"><b>aquí</b> </a>. </p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                    </div>

                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <div wire:ignore>


                            <div class="col-span-4 sm:col-span-1" gap-6>
                                <select name="institucion"
                                    class="select3 mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    @if (isset($perfil->id_institucion))
                                        <option value="{{ $perfil->id_institucion }}" selected>
                                            {{ $institucion->nombre }}
                                        </option>
    
                                        @foreach ($allInstituciones as $institucion)
                                            @if ($institucion->id == $perfil->id_institucion)
    
                                            @else
                                                <option value="{{ $institucion->id }}">
                                                    {{ $institucion->nombre }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="" selected>-- Selecciona la Revista --</option>
    
                                        @foreach ($allInstituciones as $institucion)
                                            <option value="{{ $institucion->id }}">
                                                {{ $institucion->nombre }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
    
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Editar Coloquio
                </button>
            </div>
        </form>
<script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('.select3').select2();
        });
    </script>

    </div>

</div>