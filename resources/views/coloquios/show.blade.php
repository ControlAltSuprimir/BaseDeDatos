<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ ($data['coloquio']->titulo== '') ? 'Coloquio sin Nombre' : $data['coloquio']->titulo}}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/coloquios/{{ $data['coloquio']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Coloquio
                </button>
            </a>

        </div>
    </div>


    <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#"
                        class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Información Principal
                    </a>
                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Artículos
              </a>

              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a> --}}
                </nav>
            </div>
        </div>
    </div>

    <!-- Description list -->
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            {{-- <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                  Título
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['coloquio']->titulo }}
                </dd>
              </div> --}}
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Expositor
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ ($data['expositor']) ? $data['expositor']->full_name() : ''}}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Institución
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ ($data['institucion']) ? $data['institucion']->nombre : '' }}
                </dd>

            </div>


            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Fecha
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['coloquio']->fecha }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    
                </dd>

            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    URL
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <a href="/{{ $data['coloquio']->url }}" target="_blank"> {{ $data['coloquio']->url }} </a>
                </dd>

            </div>
            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Youtube URL
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <a href="/{{ $data['coloquio']->youtube }}" target="_blank">{{ $data['coloquio']->youtube }} </a>
                </dd>

            </div>


        </dl>
    </div>



    {{--  --}}

    <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#"
                        class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Resumen
                    </a>
                    {{-- <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Artículos
              </a>

              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a> --}}
                </nav>
            </div>
        </div>
    </div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">

                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['coloquio']->abstract }}
                </dd>
            </div>



        </dl>
    </div>

    <!-- Description list -->



</x-app-layout>
