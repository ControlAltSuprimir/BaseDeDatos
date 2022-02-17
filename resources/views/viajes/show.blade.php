<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Viaje de {{ $data['viaje']->persona->full_name() }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

            <a href="/personas/{{ $data['viaje']->id_persona }}">
                <button type="button"
                    class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                    Ir a Perfil de {{ $data['viaje']->persona->primer_nombre }}
                </button>
            </a>

            <a href="/viajes/{{ $data['viaje']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Viaje
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
                        Datos Principales
                    </a>

                </nav>
            </div>
        </div>
    </div>

    <!-- Description list -->
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Financiamiento
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->financiamiento }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Fecha
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->fecha }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    País de Origen
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->paisOrigen }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Ciudad de Origen
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->ciudadOrigen }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    País Destino
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->paisDestino }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Ciudad Destino
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['viaje']->ciudadDestino }}
                </dd>
            </div>


        </dl>
    </div>
    <br>
    <br>
    <hr>
    <br>
    <div>
      <div class="mt-6 sm:mt-2 2xl:mt-5">
        
          <div class="border-b border-gray-200">
            
              <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1>Financiamiento y Actividades Relacionadas</h1> <br>
                  <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                      <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                      <a href="#"
                          class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          aria-current="page" onclick="openCity(event, 'London')">
                          Proyectos
                      </a>

                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Tokyo')">
                          Instituciones
                      </a>
                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Seul')">
                          Actividades
                      </a>
                      {{--
                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Shanghai')">
                          Viajes
                      </a>--}}
                  </nav>
              </div>
          </div>
      </div>

      <div>
          <!-- Datos Personales -->
          <div id="London" class="tabcontent active" style="display: block">
              <?php $edit = $data['viaje']->id;
              $type = 1; ?> 
              @livewire('modals.viaje.proyectosviaje',['edit'=>$edit])


          </div>



          {{-- Formación --}}

          <div id="Tokyo" class="tabcontent ">
            @livewire('modals.viaje.institucionesviaje',['edit'=>$edit])
          </div>

          <div id="Seul" class="tabcontent ">
            @livewire('modals.viaje.actividadesviaje',['edit'=>$edit])
          </div>
          <div id="Shanghai" class="tabcontent ">


          </div>
      </div>
  </div>


  <br><br>

  {{-- TABS DEL PERFIL --}}

  <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
              tablinks[i].className = tablinks[i].className.replace(
                  " border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm",
                  " border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
              );
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className +=
              " border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm";

      }
  </script>

  <style>
      .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
      }

  </style>


</x-app-layout>
