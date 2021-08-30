<x-app-layout>
    <!-- Page title & actions -->




    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Formularios
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                    Share
                  </button> --}}
            {{-- <a href="/articulos/create">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Añadir Artículo
                </button>
            </a> --}}
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

    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Projects list (only on smallest breakpoint) -->

        <!-- This example requires Tailwind CSS v2.0+ -->
        <fieldset>
            <legend class="sr-only">
                Server size
            </legend>
            <div class="space-y-4">
                <!-- Active: "ring-1 ring-offset-2 ring-indigo-500" -->
                

                <a href="/formularios/viaje"
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">
                    
                        <div>

                            <input type="radio" name="server-size" value="Hobby" class="sr-only"
                                aria-labelledby="server-size-0-label"
                                aria-describedby="server-size-0-description-0 server-size-0-description-1">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p id="server-size-0-label" class="font-medium text-gray-900">
                                        Viajes
                                    </p>
                                    <div id="server-size-0-description-0" class="text-gray-500">
                                        <p class="sm:inline">Sólo para Académicos</p>
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

                    <a href="#"
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">
                    
                        <div>

                            <input type="radio" name="server-size" value="Hobby" class="sr-only"
                                aria-labelledby="server-size-0-label"
                                aria-describedby="server-size-0-description-0 server-size-0-description-1">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p id="server-size-0-label" class="font-medium text-gray-900">
                                        Programas
                                    </p>
                                    <div id="server-size-0-description-0" class="text-gray-500">
                                        <p class="sm:inline">Sólo para Académicos</p>
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
            


                {{-- <!-- Active: "ring-1 ring-offset-2 ring-indigo-500" -->
                <label
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">
                    <input type="radio" name="server-size" value="Startup" class="sr-only"
                        aria-labelledby="server-size-1-label"
                        aria-describedby="server-size-1-description-0 server-size-1-description-1">
                    <div class="flex items-center">
                        <div class="text-sm">
                            <p id="server-size-1-label" class="font-medium text-gray-900">
                                Startup
                            </p>
                            <div id="server-size-1-description-0" class="text-gray-500">
                                <p class="sm:inline">12GB / 6 CPUs</p>
                                <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                <p class="sm:inline">256 GB SSD disk</p>
                            </div>
                        </div>
                    </div>
                    <div id="server-size-1-description-1"
                        class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                        <div class="font-medium text-gray-900">$80</div>
                        <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                </label>

                <!-- Active: "ring-1 ring-offset-2 ring-indigo-500" -->
                <label
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">
                    <input type="radio" name="server-size" value="Business" class="sr-only"
                        aria-labelledby="server-size-2-label"
                        aria-describedby="server-size-2-description-0 server-size-2-description-1">
                    <div class="flex items-center">
                        <div class="text-sm">
                            <p id="server-size-2-label" class="font-medium text-gray-900">
                                Business
                            </p>
                            <div id="server-size-2-description-0" class="text-gray-500">
                                <p class="sm:inline">16GB / 8 CPUs</p>
                                <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                <p class="sm:inline">512 GB SSD disk</p>
                            </div>
                        </div>
                    </div>
                    <div id="server-size-2-description-1"
                        class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                        <div class="font-medium text-gray-900">$160</div>
                        <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                </label>

                <!-- Active: "ring-1 ring-offset-2 ring-indigo-500" -->
                <label
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">
                    <input type="radio" name="server-size" value="Enterprise" class="sr-only"
                        aria-labelledby="server-size-3-label"
                        aria-describedby="server-size-3-description-0 server-size-3-description-1">
                    <div class="flex items-center">
                        <div class="text-sm">
                            <p id="server-size-3-label" class="font-medium text-gray-900">
                                Enterprise
                            </p>
                            <div id="server-size-3-description-0" class="text-gray-500">
                                <p class="sm:inline">32GB / 12 CPUs</p>
                                <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                <p class="sm:inline">1024 GB SSD disk</p>
                            </div>
                        </div>
                    </div>
                    <div id="server-size-3-description-1"
                        class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                        <div class="font-medium text-gray-900">$240</div>
                        <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                </label> --}}
            </div>
        </fieldset>

    </div>

    <script type="text/javascript">
        <!--
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
        //
        -->
    </script>





</x-app-layout>
