<style>
    #profile {
        display: none
    }

</style>
@guest


    <div class="sidenav h-0 flex-1 flex flex-col overflow-y-auto">
        <!-- User account dropdown -->
        <div class="  px-3 mt-6 relative inline-block text-left">

            <div>
                <a href="/login">
                    <button type="button"
                        class="dropdown-btn group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                        id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="flex w-full justify-between items-center">
                            <span class="flex min-w-0 items-center justify-between space-x-3">
                                {{-- <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"> --}}
                                <span class="flex-1 flex flex-col min-w-0">
                                    <span class="text-gray-900 text-sm font-medium truncate">Iniciar sesión</span>
                                    <span class="text-gray-500 text-sm truncate"> </span>
                                </span>
                            </span>
                            <!-- Heroicon name: solid/selector -->
                            {{-- <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg> --}}
                        </span>
                    </button>
                </a>
            </div>




        </div>
    </div>

@endguest

<div class="sidenav h-0 flex-1 flex flex-col overflow-y-auto">
    <!-- User account dropdown -->
    @auth


        <div class="  px-3 mt-6 relative inline-block text-left">
            <div>
                <button onclick="toggle_visibility('profile');" type="button"
                    class="dropdown-btn group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                    id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="flex w-full justify-between items-center">
                        <span class="flex min-w-0 items-center justify-between space-x-3">
                            <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            <span class="flex-1 flex flex-col min-w-0">
                                <span class="text-gray-900 text-sm font-medium truncate">{{ Auth::user()->name }}</span>
                                <span class="text-gray-500 text-sm truncate">{{ Auth::user()->email }}</span>
                            </span>
                        </span>
                        <!-- Heroicon name: solid/selector -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>

            <!--
                Dropdown menu, show/hide based on menu state.
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
            <div id="profile"
                class="dropdown-container z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="/personas/{{ Auth::user()->persona()->id }}" class="text-gray-700 block px-4 py-2 text-sm"
                        role="menuitem" tabindex="-1" id="options-menu-item-0">Ver Perfil</a>
                    {{-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                    id="options-menu-item-1">Ajustes de Usuario</a> --}}
                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Ajustes de Usuario') }}
                    </x-jet-dropdown-link>
                    {{-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                    id="options-menu-item-2">Notifications</a> --}}
                </div>
                <div class="py-1" role="none">
                    {{-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                    id="options-menu-item-3">Get desktop app</a> --}}

                    <a href="/soporte" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-4">Soporte</a>
                </div>
                <div class="py-1" role="none">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sidebar Search -->
        


        <!-- Navigation -->
        <nav class="px-3 mt-6">
            <div>
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="/dashboard"
                    class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md">
                    <!--
                        Heroicon name: outline/home
            
                        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                      -->
                    <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
            </div>

            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <button onclick="toggle_visibility('personas');" type="button"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-1" aria-expanded="false">
                    <!-- Heroicon name: outline/users -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <div>Personas</div>

                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                    {{-- <svg class="text-gray-300 ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                    viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg> --}}
                </button>
                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-1">
                    <div id="personas" style="display: none;">
                        <a href="/academicos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Equipo
                        </a>
{{--
                        <a href="/alumnos"
                        class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                        Alumnos
                    </a>
                    --}}
                        {{-- <a href="#"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Ex - Alumnos
                        </a> --}}

                        <a href="/personas"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            General
                        </a>
                    </div>
                </div>
            </div>
            

            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <button type="button" onclick="toggle_visibility('investigacion');"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-2" aria-expanded="false">
                    <!-- Heroicon name: outline/folder -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Investigación
                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                    {{-- <svg class="text-gray-300 ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                    viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg> --}}
                </button>
                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-2">
                    <div id="investigacion" style="display: none;">
                        <a href="/articulos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Artículos
                        </a>

                        <a href="/proyectos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Proyectos
                        </a>

                        <a href="/revistas"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Revistas
                        </a>
                        <a href="/tesis"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Tesis
                        </a>
                        <a href="/indexaciones"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Indexaciones
                        </a>
                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <button type="button" onclick="toggle_visibility('docencia');"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-6" aria-expanded="false">
                    <!-- Heroicon name: outline/folder -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        {{--<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />--}}
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    Docencia
                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                    {{-- <svg class="text-gray-300 ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                    viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg> --}}
                </button>
                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-6">
                    <div id="docencia" style="display: none;">
                        <a href="/cursos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Cursos
                        </a>

                        <a href="/docencia/estudiantes"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Estudiantes
                        </a>

                        <a href="/docencia/exestudiantes"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Ex Estudiantes
                        </a>
                    </div>
                </div>
            </div>


            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <button type="button" onclick="toggle_visibility('actividades');"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-3" aria-expanded="false">
                    <!-- Heroicon name: outline/calendar -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Actividades
                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                    {{-- <svg class="text-gray-300 ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                    viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg> --}}

                </button>
                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-3">
                    <div id="actividades" style="display: none;">
                        <a href="/coloquios"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Coloquios Las Palmeras (Beta)
                        </a>
                        <a href="/actividadacademica"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Académicas
                        </a>

                        <a href="/actividadextension"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Extensión
                        </a>

                        <a href="/viajes"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Viajes
                        </a>
                        {{-- <a href="#"
                        class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                        Settings
                    </a> --}}
                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <button type="button" onclick="toggle_visibility('administracion');"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-4" aria-expanded="false">
                    <!-- Heroicon name: outline/inbox -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    Administración
                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                    {{-- <svg id="spin" class="text-gray-300 ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                    viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg> --}}
                </button>
                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-4">
                    <div id="administracion" style="display: none;">
                        <a href="/formularios"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Formularios
                        </a>
                        <a href="/programas"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Programas
                        </a>

                        <a href="/financiamiento"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Financiamiento
                        </a>
                        {{-- <a href="#"
                        class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                        Settings
                    </a> --}}
                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->

                <button type="button" onclick="toggle_visibility('graficos');"
                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-controls="sub-menu-5" aria-expanded="false">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Gráficos
                    <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                </button>

                <!-- Expandable link section, show/hide based on state. -->
                <div class="space-y-1" id="sub-menu-5">
                    <div id="graficos" style="display: none;">

                        <a href="/graficos/articulos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Artículos
                        </a>
                        <a href="/graficos/financiamiento"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Financiamiento
                        </a>

                        {{--
                        <a href="/graficos/proyectos"
                            class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            Proyectos
                        </a>
                        --}}
                        {{-- <a href="#"
                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                    Calendar
                </a>

                <a href="#"
                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                    Settings
                </a> --}}
                    </div>
                </div>
            </div>

            <div class="mt-8">
                

                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                    Tareas Pendientes
                </h3>
                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">


                    @livewire('notificacion.notificacionviajes')


                </div>
            </div>
            <?php
                $rol = auth()
                    ->user()
                    ->rol->first();
                ?>
                @if ($rol->rol == 'Admin')

                    

            <div class="mt-8">

                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
                    Opciones de Administrador
                </h3>
                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">


                    <a href="/user" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">

                        <span class="w-2.5 h-2.5 mr-4 bg-blue-500 rounded-full" aria-hidden="true"></span>
                        <span class="flex-1">
                          Usuarios
                        </span>
                        {{--
                        <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">
                          
                        </span>--}}
                      </a>


                </div>

                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">


                    <a href="/sincronizacion" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">

                        <span class="w-2.5 h-2.5 mr-4 bg-blue-500 rounded-full" aria-hidden="true"></span>
                        <span class="flex-1">
                      Sincronización de Datos
                        </span>
                        {{--
                        <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">
                          
                        </span>--}}
                      </a>


                </div>
            </div>
            @endif
        </nav>

    @endauth
</div>


<script type="text/javascript">
    var click = false;

    function toggle_visibility(id) {
        var spin1 = document.getElementById("spin");
        {{-- if(!click){
            spin1.style.transform = "rotate(90deg)";
            click=true;
           }else{
            click=false;
            spin1.style.transform = "rotate(180deg)";
           } --}}
        var e = document.getElementById(id);
        if (e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }


    //
</script>

{{-- <div id="foo">This is foo</div> --}}


<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.visibility === "hidden") {
                dropdownContent.style.visibility = "inline";
            } else {
                dropdownContent.style.visibility = "hidden";
            }
        });
    }
</script>
