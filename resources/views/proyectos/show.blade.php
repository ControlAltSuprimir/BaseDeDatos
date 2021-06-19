<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ $data['proyecto']->titulo }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button> --}}
            <a href="/proyectos/{{ $data['proyecto']->id }}/edit">
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Editar Proyecto
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
                        Perfil
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
                    Investigador Responsable
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {!! $data['proyecto']->responsable->full_name() !!}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Tipo Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->tipo_proyecto }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Organización que Financia
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->organizacion_financia }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Fecha Inicio
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->comienzo }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Fecha Término
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->termino }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Monto Adjudicado
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->monto_adjudicado }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    Código del Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->codigo_proyecto }}
                </dd>

            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Área de Investigación
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->area }}
                </dd>
            </div>

            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">
                    {{-- Organización que Financia --}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{-- {{ $data['proyecto']->organizacion_financia }} --}}
                </dd>

            </div>
            <hr>

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Descripción del Proyecto
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $data['proyecto']->descripcion }}
                </dd>
            </div>


        </dl>
    </div>
    <br><br>
    <hr>

    @if (count($data['articulos']) != 0)

        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a href="#"
                            class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">
                            Artículos Relacionados
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                @foreach ($data['articulos'] as $articulo)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            {{-- About --}}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {!! $articulo !!}
                            {{-- Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu. --}}
                        </dd>
                    </div>
                @endforeach




            </dl>
        </div>
    @else
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">No hay Artículos Relacionados</div>


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
                            Tesis Relacionados
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                @foreach ($data['tesis'] as $tesis)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {!! $tesis !!}
                            
                        </dd>
                    </div>
                @endforeach




            </dl>
        </div>
    @else
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                        <div class=" text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                            aria-current="page">No hay Tesis Relacionados</div>


                    </nav>
                </div>
            </div>
        </div>

    @endif






</x-app-layout>
