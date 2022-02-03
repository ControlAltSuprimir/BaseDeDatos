<x-app-layout>
    <!-- Page title & actions -->




    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Financiamiento
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


                <a href="/financiamiento/actividades"
                    class="relative block rounded-lg border border-gray-300 bg-white shadow-sm px-6 py-4 cursor-pointer hover:border-gray-400 sm:flex sm:justify-between focus:outline-none">

                    <div>

                        <input type="radio" name="server-size" value="Hobby" class="sr-only"
                            aria-labelledby="server-size-0-label"
                            aria-describedby="server-size-0-description-0 server-size-0-description-1">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p id="server-size-0-label" class="font-medium text-gray-900">
                                    Financiamiento en Actividades
                                </p>
                                <div id="server-size-0-description-0" class="text-gray-500">
                                    <p class="sm:inline"> &emsp;</p>
                                    {{--<span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>--}}
                                    <p class="sm:inline"> Departamento de Matemáticas</p>
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

                <br>

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
