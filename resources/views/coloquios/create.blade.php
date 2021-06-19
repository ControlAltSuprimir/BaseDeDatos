<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Añadir Coloquio
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
    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
      <div>

        <form action="{{ route('coloquios.store') }}" method="POST">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información del Coloquio</h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo" autocomplete="cc-exp"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            placeholder="" required>
                    </div>
    
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="fecha" id="fecha" autocomplete="cc-given-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
    
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Url en la página del Departamento</label>
                            <input type="text" name="url" id="url" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
    
                        <div class="col-span-4 sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Url en Youtube </label>
                            <input type="text" name="youtube" id="youtube" autocomplete="cc-family-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        {{--
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
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Link del artículo en
                                Arxiv</label>
                            <input type="text" name="arxiv" id="arxiv" autocomplete="cc-given-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        --}}
    
    
    
                    </div>
                    <div class="col-span-4 py-6 sm:col-span-1" gap-6>
                      <label for="expiration_date" class="block text-sm font-medium text-gray-700">Resumen de la Charla</label>
                      <textarea id="abstract" name="abstract" rows="3"
                      class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                  </div>
                    
    
    
    
                </div>
            </div>
    
    
            {{-- Expositor --}}
    
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Nombre del Expositor
                        </h2>
                        <p class="mt-1 text-sm text-gray-500"></p>
                    </div>
    
                    <div class="mt-6 grid grid-cols-4 gap-6">
                    </div>
    
                    <div class="col-span-4 sm:col-span-1" gap-6>
                        <select name="expositor"
                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            required>
                            <option value="">-- Selecciona al Expositor --</option>
    
                            @foreach ($data['expositores'] as $persona)
                                <option value="{{ $persona->id }}">
                                    {{ $persona->full_name() }}
                                </option>
                            @endforeach
                        </select>
    
                    </div>
                </div>
            </div>
    
            {{-- Institución --}}

            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 sm:p-6">
                  <div>
                      <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Institución del Expositor
                      </h2>
                      <p class="mt-1 text-sm text-gray-500">Si la institución no se encuentra en la base de datos, debes agregarla primero  <a href="">aquí</a>. </p>
                  </div>
  
                  <div class="mt-6 grid grid-cols-4 gap-6">
                  </div>
  
                  <div class="col-span-4 sm:col-span-1" gap-6>
                      <select name="institucion"
                          class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                          required>
                          <option value="">-- Selecciona la Institución --</option>
  
                          @foreach ($data['instituciones'] as $institucion)
                              <option value="{{ $institucion->id }}">
                                  {{ $institucion->nombre }}
                              </option>
                          @endforeach
                      </select>
  
                  </div>
              </div>
          </div>
    
            
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                @csrf
                <button type="submit"
                    class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Añadir Coloquio
                </button>
            </div>
        </form>
    
    </div>
    </div>
</x-app-layout>
