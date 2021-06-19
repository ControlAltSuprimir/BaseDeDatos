<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            {{ $data['indexacion']->nombre}}
          </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
          {{--
        <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button>
          --}}
          <a href="/indexaciones/{{$data['indexacion']->id}}/edit">
          <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
          Editar  
          </button>
        </a>
          
        </div>
      </div>

      
      <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
          <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
              <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
              <a href="#" class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                Revistas Indexadas
              </a>
              {{--
              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Artículos
              </a>

              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Formación
              </a>
              --}}
            </nav>
          </div>
        </div>
      </div>


      <?php $filtro=array(
        'tipo' => 'indexacion',
        'id' => $data['indexacion']->id
      ); ?>
      @livewire('tablas.revistasporindexacion',['filtro'=>$filtro])

      {{-- --}}

      

      
      

</x-app-layout>