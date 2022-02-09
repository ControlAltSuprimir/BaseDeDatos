<x-app-layout>
  <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
      <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
          {{ $data['extension']->nombre}}
        </h1>
      </div>
      <div class="mt-4 flex sm:mt-0 sm:ml-4">
        {{--
      <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
          Share
        </button>
        --}}
        <a href="/actividadextension/{{$data['extension']->id}}/edit">
        <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
        Editar Actividad  
        </button>
      </a>
        
      </div>
    </div>

    @if (session()->has('success'))

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div id="successModal">
            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


                    <div
                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <!-- Heroicon name: outline/check -->
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    {{ session('success')['titulo'] }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">

                                        {{ session('success')['contenido'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <button type="button" onclick="closeModalFunction()"
                                class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cerrando modal--}}
        <script>
            var modal = document.getElementById("successModal");
            // When the user clicks on the button, close the modal
            function closeModalFunction(){
                modal.style.display = "none";
            }
        </script>


    @endif
    
    <div class="mt-6 sm:mt-2 2xl:mt-5">
      <div class="border-b border-gray-200">
        <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
            <a href="#" class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
              Perfil
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
            Tipo
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{$data['extension']->tipo}}
          </dd>
        </div>

        <div class="sm:col-span-1">
          
          <dt class="text-sm font-medium text-gray-500">
            Número de Participantes
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{$data['extension']->numeroParticipantes}}
          </dd>
          
        </div>

        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Público Objetivo
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{$data['extension']->publicoObjetivo}}
          </dd>
        </div>

        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Inicio / Término
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{$data['extension']->fecha_comienzo}} / {{$data['extension']->fecha_termino}}
          </dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Comentarios
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{$data['extension']->comentarios}}
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

    {{-- --}}

    <hr>

    <div>
      <div class="mt-6 sm:mt-2 2xl:mt-5">
          <div class="border-b border-gray-200">
              <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                  <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                      <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                      <a href="#"
                          class="tablinks border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          aria-current="page" onclick="openCity(event, 'London')">
                          Participantes
                      </a>

                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Tokyo')">
                          Proyectos
                      </a>
                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Seoul')">
                          Instituciones Financiadoras
                      </a>
                      <a href="#"
                          class="tablinks border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                          onclick="openCity(event, 'Shanghai')">
                          Viajes Asociados
                      </a>
                  </nav>
              </div>
          </div>
      </div>

      <div>
          <!-- Datos Personales -->
          <div id="London" class="tabcontent active" style="display: block">
            <?php $edit = $data['extension']->id;
                $type = 0; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.participantesactividad',['edit'=>$edit, 'type' =>$type])
          </div>



          {{-- Formación --}}

          <div id="Tokyo" class="tabcontent ">
            <?php $edit = $data['extension']->id;
                $type = 0; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.proyectosactividad',['edit'=>$edit, 'type' =>$type])

            
              
          </div>

          <div id="Seoul" class="tabcontent ">
            <?php $edit = $data['extension']->id;
                $type = 0; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.institucionesactividad',['edit'=>$edit, 'type' =>$type])
          </div>
          <div id="Shanghai" class="tabcontent ">
            <?php $edit = $data['extension']->id;
                $type = 0; ?> {{-- 1=>academica, 0=>extension --}}
                @livewire('modals.viajesactividad',['edit'=>$edit, 'type' =>$type])
          </div>


          </div>
      </div>
  </div>




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