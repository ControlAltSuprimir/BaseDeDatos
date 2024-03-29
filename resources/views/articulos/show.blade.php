<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['articulo']->titulo }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/articulos/{{ $data['articulo']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Artículo
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

    <!-- Description list -->
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">


            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Autores
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {!! $data['autores'] !!}
                </dd>
            </div>



            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Revista
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['revista']->nombre }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    DOI
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->DOI }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Estado de Publicación
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->estado_publicacion }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Año de Publicación
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->fecha_publicacion }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Intervalo de Páginas
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->intervalo_paginas }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Issue
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->issue }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Volumen
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['articulo']->volumen }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
              Clasificación de la revista en que fue publicado
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
               {{ $data['articulo']->clasificacion()}}
            </dd>
            </div>

            <div class="sm:col-span-2">
                {{-- <dt class="text-sm font-medium text-gray-500">
              About
            </dt>
            <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">
              <p>
                Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.
              </p>
              <p>
                Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.
              </p>
            </dd> --}}
            </div>
        </dl>
    </div>

    {{-- Proyectos --}}

    @if (!$data['proyectos']->isEmpty())

        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a href="#"
                            class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">
                            Proyectos Relacionados
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mt-6 max-w-12xl mx-auto px-0 sm:px-6 lg:px-0">
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                            class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título
                        
                        </th>
                        
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Investigador Responsable
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Código Proyecto
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Duración Proyecto
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Odd row -->
                    @foreach ($data['proyectos'] as $proyecto)
                        <tr class="bg-white">
                            <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {!! $proyecto->tituloLink() !!}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {!! $proyecto->responsable->full_nameLink() !!}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $proyecto->codigo_proyecto }}
                            </td>
                            
                            <td scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $proyecto->intervalo()}}
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

        
    </div>
    @else
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">No hay Proyectos Relacionados</div>


                    </nav>
                </div>
            </div>
        </div>

    @endif

    <br><br>
    <hr>



    @if (count($data['tesis']) != 0)

        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a href="#"
                            class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">
                            Tesis Relacionadas
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th wire:click="sortBy('titulo')" style="cursor: pointer;" scope="col"
                            class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título
                            {{-- include('partials._sort-icon',['field'=>'titulo'])--}}
                        </th>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
  Title
</th> --}}
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Autor
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tutor
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha Defensa
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Odd row -->
                    @foreach ($data['tesis'] as $tesis)
                        <tr class="bg-white">
                            <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {!! $tesis->full_nameLink() !!}
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
  {{$persona}}
</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {!!$tesis->elAutor->full_nameLink()!!}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {!! $tesis->tutor_de_la_tesis->full_nameLink() !!}
                            </td>
                            <td scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                @if (isset($tesis->fechaDefensa))
                                {{ $tesis->fechaDefensa }}
                                @else
                                    En Curso                                    
                                @endif

                            </td>
                        </tr>
                    @endforeach

                    <!-- Even row -->


                    <!-- More people... -->
                </tbody>
            </table>
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                




            </dl>
        </div>

        @else
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">No hay Tesis Relacionadas</div>


                    </nav>
                </div>
            </div>
        </div>

    @endif



</x-app-layout>
