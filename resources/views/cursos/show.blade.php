<x-app-layout>
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            {{ $data['curso']->titulo }} ({{ $data['curso']->institucion->nombre}})
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
      Share
    </button> --}}
        <a href="/cursos/{{ $data['curso']->id }}/edit">
            <button type="button"
                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                Editar Curso
            </button>
        </a>

    </div>
</div>


<div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Docente(s) Responsable(s)
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {!! $data['curso']->losProfes() !!}
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Código
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->codigo }}
            </dd>
        </div>

        <div class="sm:col-span-1">

            <dt class="text-sm font-medium text-gray-500">
                Categoría
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->categoria }}
            </dd>

        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Período
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->periodo }} / {{ $data['curso']->ano }}
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Inscrito en U-Cursos
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                <?php echo ($data['curso']->u_cursos) ? 'Sí' : 'No'; ?>
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                URL
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->url }}
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                URL del Programa
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->programa }}
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Resumen del Curso
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->resumen }}
            </dd>
        </div>

        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Comentarios del Curso
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $data['curso']->comentarios }}
            </dd>
        </div>

        <div class="sm:col-span-2">

        </div>
    </dl>
</div>


<br><br>
<hr>
<?php 
//$edit[] = $data['curso']->id; 
//$edit[] =Auth::user()->id;?>

@livewire('tablas.estudiantescurso',['edit' => $data['curso']->id])

<br><br>

</x-app-layout>    