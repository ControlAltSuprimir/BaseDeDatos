<x-app-layout>
    <!-- Page title & actions -->

    <?php if ($data['estudiantes'] == 'estudiantes') {
        $estado = 'Estudiantes';
    } elseif ($data['estudiantes'] == 'exestudiantes') {
        $estado = 'Ex Estudiantes';
    } ?>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                <?php if ($data['programa'] == 'licenciatura') {
                    echo $estado . ' de Licenciatura en Ciencias con Mención Matemáticas';
                } elseif ($data['programa'] == 'pedagogia') {
                    echo $estado . ' de Pedagogía en Educación Matemática y Física';
                } elseif ($data['programa'] == 'magister') {
                    echo $estado . ' de Magíster en Ciencias Matemáticas';
                } elseif ($data['programa'] == 'doctorado') {
                    echo $estado . ' de Doctorado en Ciencias, Mención Matemáticas';
                } ?>
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{--
            <a href="/estudiantes/create">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Añadir Estudiante(s)
                </button>
            </a>
            --}}
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
    <?php $filtro = []; ?>
    <?php if ($data['estudiantes'] == 'estudiantes') {
        $filtro['estado'] = 'estudiante';
    } elseif ($data['estudiantes'] == 'exestudiantes') {
        $filtro['estado'] = 'exestudiante';
    } ?>
    <?php
    $filtro['programa'] = $data['programa']; ?>
    <?php $filtro = []; ?>
    <?php if ($data['estudiantes'] == 'estudiantes') {
        $filtro['estado'] = 'estudiante';
    } elseif ($data['estudiantes'] == 'exestudiantes') {
        $filtro['estado'] = 'exestudiante';
    } ?>
    <?php
    $filtro['programa'] = $data['programa']; ?>
    @livewire('tablas.filtroestudiantes',['filtro' => $filtro])





</x-app-layout>
