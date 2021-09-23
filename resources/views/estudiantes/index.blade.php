<x-app-layout>
    <!-- Page title & actions -->
    <?php if($data['estudiantes']=='estudiantes'){
        $estado='Estudiantes';
    $link='estudiantes';}
        elseif($data['estudiantes']=='exestudiantes'){
            $estado='Ex Estudiantes';
            $link='exestudiantes';
    }?>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{$estado}}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            
        </div>
    </div>
    <!-- Pinned projects -->

    @if (session()->has('success'))
        {{-- <div class="alert-success" id="popup_notification">
            <strong>{!! trans('main.message') !!}</strong>
        </div> --}}
        <div id="success_articulo" style="display: block;" aria-live="assertive"
            class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                <!--
                Notification panel, dynamically insert this into the live region when it needs to be displayed
          
                Entering: "transform ease-out duration-300 transition"
                  From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                  To: "translate-y-0 opacity-100 sm:translate-x-0"
                Leaving: "transition ease-in duration-100"
                  From: "opacity-100"
                  To: "opacity-0"
              -->
                <div
                    class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/check-circle -->
                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ session('success') }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{-- Anyone with a link can now view this file. --}}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button onclick="toggle_visibility('success_articulo');"
                                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <br>

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Selecciona un
                    Programa</h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>
            

            <div class="mt-6 grid grid-cols-4 gap-6">
                <div class="col-span-4 sm:col-span-2">
                    <a href="/docencia/{{$link}}/licenciatura"
                        class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">

                        <div>

                            <input type="radio" name="server-size" value="Hobby" class="sr-only"
                                aria-labelledby="server-size-0-label"
                                aria-describedby="server-size-0-description-0 server-size-0-description-1">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p id="server-size-0-label" class="font-medium text-gray-900">
                                        Licenciatura en Ciencias con Mención Matemáticas
                                    </p>
                                    <div id="server-size-0-description-0" class="text-gray-500">
                                        <p class="sm:inline">Pregrado</p>
                                        <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                        <p class="sm:inline"> </p>
                                    </div>
                                </div>
                            </div>
                            <div id="server-size-0-description-1"
                                class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                <div class="font-medium text-gray-900"> </div>
                                <div class="ml-1 text-gray-500 sm:ml-0"> </div>
                            </div>
                            <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <a href="/docencia/{{$link}}/pedagogia"
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">

                    <div>

                        <input type="radio" name="server-size" value="Hobby" class="sr-only"
                            aria-labelledby="server-size-0-label"
                            aria-describedby="server-size-0-description-0 server-size-0-description-1">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p id="server-size-0-label" class="font-medium text-gray-900">
                                    Pedagogía en Educación Matemática y Física
                                </p>
                                <div id="server-size-0-description-0" class="text-gray-500">
                                    <p class="sm:inline">Pregrado</p>
                                    <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                    <p class="sm:inline"> </p>
                                </div>
                            </div>
                        </div>
                        <div id="server-size-0-description-1"
                            class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                            <div class="font-medium text-gray-900"> </div>
                            <div class="ml-1 text-gray-500 sm:ml-0"> </div>
                        </div>
                        <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true">
                        </div>
                    </div>
                </a>
                </div>

                

                <div class="col-span-4 sm:col-span-2">
                    <a href="/docencia/{{$link}}/magister"
                        class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">

                        <div>

                            <input type="radio" name="server-size" value="Hobby" class="sr-only"
                                aria-labelledby="server-size-0-label"
                                aria-describedby="server-size-0-description-0 server-size-0-description-1">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p id="server-size-0-label" class="font-medium text-gray-900">
                                        Magíster en Ciencias Matemáticas
                                    </p>
                                    <div id="server-size-0-description-0" class="text-gray-500">
                                        <p class="sm:inline">Postgrado</p>
                                        <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                        <p class="sm:inline"> </p>
                                    </div>
                                </div>
                            </div>
                            <div id="server-size-0-description-1"
                                class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                <div class="font-medium text-gray-900"> </div>
                                <div class="ml-1 text-gray-500 sm:ml-0"> </div>
                            </div>
                            <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <a href="/docencia/{{$link}}/doctorado"
                        class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">

                        <div>

                            <input type="radio" name="server-size" value="Hobby" class="sr-only"
                                aria-labelledby="server-size-0-label"
                                aria-describedby="server-size-0-description-0 server-size-0-description-1">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p id="server-size-0-label" class="font-medium text-gray-900">
                                        Doctorado en Ciencias, Mención Matemáticas
                                    </p>
                                    <div id="server-size-0-description-0" class="text-gray-500">
                                        <p class="sm:inline">Postgrado</p>
                                        <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                        <p class="sm:inline"> </p>
                                    </div>
                                </div>
                            </div>
                            <div id="server-size-0-description-1"
                                class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                <div class="font-medium text-gray-900"> </div>
                                <div class="ml-1 text-gray-500 sm:ml-0"> </div>
                            </div>
                            <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true">
                            </div>
                        </div>
                    </a>
                </div>





            </div>



        </div>
    </div>



    





</x-app-layout>
