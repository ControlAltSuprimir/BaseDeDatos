<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Editar Institución
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
      <section aria-labelledby="payment_details_heading">
          <form action="{{ route('instituciones.update',$data['institucion']->id) }}" method="POST">

            
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="bg-white py-6 px-4 sm:p-6">
                      <div class="col-span-4 sm:col-span-1" gap-6>
                          <label for="expiration_date" class="block text-sm font-medium text-gray-700">Nombre de la Institución</label>
                          <input type="text" name="nombre" id="expiration_date" autocomplete="cc-exp"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                              value="{{$data['institucion']->nombre}}" required>
                      </div>

                      <div class="mt-6 grid grid-cols-4 gap-6">
                          <div class="col-span-4 sm:col-span-2">
                              <label for="first_name" class="block text-sm font-medium text-gray-700">País</label>
                              <input type="text" name="pais" id="DOI" autocomplete="cc-given-name"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                  value="{{$data['institucion']->pais}}">
                          </div>

                          <div class="col-span-4 sm:col-span-2">
                              <label for="last_name" class="block text-sm font-medium text-gray-700">URL</label>
                              <input type="text" name="url" id="fecha" autocomplete="cc-family-name"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                  value="{{$data['institucion']->url}}">
                          </div>
                      </div>

                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          @csrf
                          @method('PUT')
                          <button type="submit"
                              class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                              Actualizar Institución
                          </button>
                      </div>
                  </div>
              </div>

          </form>
      </section>

  </div>
</x-app-layout>
