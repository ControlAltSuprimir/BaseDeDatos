<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Sincronización y Descarga de Datos (Beta)
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

        </div>
    </div>
   

 {{-- Error / Success --}}
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
                         {{ session('success')['boton'] }}
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 {{-- Cerrando modal --}}
 <script>
     var modal = document.getElementById("successModal");
     // When the user clicks on the button, close the modal
     function closeModalFunction() {
         modal.style.display = "none";
     }
 </script>


@endif


    <div class="bg-white">
        <section aria-labelledby="features-heading" class="mt-6 py-0 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="max-w-2xl mx-auto px-4 lg:px-0 lg:max-w-none">
      
              <div id="features-panel-1" class="space-y-4 pt-10 lg:pt-16" aria-labelledby="features-tab-1" role="tabpanel" tabindex="0">
                <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8">
                  <div class="mt-6 lg:mt-0 lg:col-span-5">
                    <h3 class="text-lg font-medium text-gray-900">¿Para qué sirve sincronizar datos?</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Para que la información pública del Departamento sea de fácil acceso creamos una API pública que la misma página del departamento utiliza en este momento. Sin embargo para evitar procesamiento innecesario, la información reelevante se apiló de una forma óptima que debe ser actualizada manualmente.
                    </p>
                  </div>
                  <div class="lg:col-span-7">
                    <div class="aspect-w-2 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden sm:aspect-w-5 sm:aspect-h-2">
                        <img src="/img/webpage.png" alt="Website del Departamento." class="object-center object-cover">
                        {{--<img src="https://tailwindui.com/img/ecommerce-images/product-feature-06-detail-01.jpg" alt="Maple organizer base with slots, supporting white polycarbonate trays of various sizes." class="object-center object-cover">--}}
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>

          

        

            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Académicos
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Actualizamos la información pública relacionada al equipo académico del Departamento.
                        </p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0">
                        <a href="/sincronizacion/academicos">
                        <button type="button"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </a>
                    </div>
                </div>
            </div>
    
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Investigación
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Actualizamos la información pública relacionada a las investigaciones realizadas.
                        </p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0">
                        <a href="/sincronizacion/articulos">
                        <button type="button"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </a>
                    </div>
                </div>
            </div>
    
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Alumnos de Postgrado (Pronto)
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Actualizamos la información pública relacionada a los alumnos de Postgrado.
                        </p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0">
                        <a href="#">
                        <button type="button"
                            class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    
        </section>
      </div>




    

</x-app-layout>
