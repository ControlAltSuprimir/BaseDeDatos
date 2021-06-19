<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            {{ $data['persona']->full_name()}}
          </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
          {{--
        <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button>
          --}}
          <a href="/personas/{{$data['persona']->id}}/edit">
          <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
          Editar Perfil 
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
                Datos Personales
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

      <!-- Description list -->
      <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Email
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->email}}
            </dd>
          </div>

          <div class="sm:col-span-1">
            
            <dt class="text-sm font-medium text-gray-500">
              Rut
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->rut}}
            </dd>
            
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              País de Nacionalidad
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->nacionalidad}}
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Teléfono de Contacto
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->telefono}}
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Alias
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->alias}}
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Fecha de Nacimiento
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{$data['persona']->fecha_nacimiento}}
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
      <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a href="#"
                        class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Publicaciones Realizadas
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
      <?php $filtro=array(
        'tipo' => 'persona',
        'id' => $data['persona']->id
      ); ?>
      @livewire('tablas.filtroarticulos',['filtro'=>$filtro])

      {{-- --}}

      <div class="mt-6 sm:mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
          <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
              <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
              <a href="#" class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                Viajes
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

      <!-- Description list -->
      <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Phone
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              (555) 123-4567
            </dd>
          </div>

          <div class="sm:col-span-1">
            {{--
            <dt class="text-sm font-medium text-gray-500">
              Email
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              ricardocooper@example.com
            </dd>
            --}}
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Title
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              Senior Front-End Developer
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Team
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              Product Development
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Location
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              San Francisco
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Sits
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              Oasis, 4th floor
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Salary
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              $145,000
            </dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Birthday
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              June 8, 1990
            </dd>
          </div>

          <div class="sm:col-span-2">
            <dt class="text-sm font-medium text-gray-500">
              About
            </dt>
            <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">
              <p>
                Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.
              </p>
              <p>
                Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.
              </p>
            </dd>
          </div>
        </dl>
      </div>

</x-app-layout>