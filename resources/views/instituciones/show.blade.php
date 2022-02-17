<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['institucion']->nombre }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/instituciones/{{ $data['institucion']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Institución
                </button>
            </a>

        </div>
    </div>




    <!-- Description list -->
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Nombre
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['institucion']->nombre }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Rut
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['institucion']->pais }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    País de Nacionalidad
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['institucion']->url }}
                </dd>
            </div>

            
            <div class="sm:col-span-1">

            </div>

            <div class="sm:col-span-1">

            </div>

            <div class="sm:col-span-2">

            </div>
        </dl>
    </div>
    
    

</x-app-layout>
