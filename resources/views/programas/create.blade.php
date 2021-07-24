<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Añadir Programa
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            {{-- <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            
          </button> --}}
        </div>
    </div>
    @if (isset($error))
        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <button type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Debes asignar una única institución por programa
                </button>

            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

            </div>
        </div>
    @endif

    <form action="{{ route('programas.store') }}" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">¿A qué
                        Institución Pertenece?
                    </h2>
                    <p class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                </div>

                <div class="col-span-4 sm:col-span-1" gap-6>
                    <select name="institucion" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option value="">-- Selecciona la Institución --</option>

                        @foreach ($data['allInstituciones'] as $institucion)
                            <option value="{{ $institucion->id }}">
                                {{ $institucion->nombre }}
                                {{-- (${{ number_format($product->price, 2) }}) --}}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <div class="bg-white py-6 px-4 sm:p-6">

                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Si la Institución
                            no se
                            encuentra en la Lista, escribe su nombre aquí</label>
                        <input type="text" name="otraInstitucion" id="expiration_date" autocomplete="cc-exp"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="Universidad de Chile">
                    </div>
                    &emsp;
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Nombre del
                            Programa</label>
                        <input type="text" name="nombre" id="expiration_date" autocomplete="cc-exp"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="Licenciatura en Ciencias con Mención en Matemáticas">
                    </div>
                    &emsp;
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">¿A qué grado
                            corresponde? </label>
                        <input type="text" name="grado" id="expiration_date" autocomplete="cc-exp"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="Licenciatura">
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                @csrf
                <button type="submit"
                    class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Añadir Programa
                </button>
            </div>
        </div>
        <hr>

    </form>
</x-app-layout>
