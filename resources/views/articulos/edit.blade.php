<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Editar Artículo
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">

        </div>
    </div>
    <?php $edit = $data['id']; ?>
    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        @livewire('editar.editararticulo',['edit'=>$edit])



        <?php // $edit=$data['id'];?>
        @livewire('borrar.borrar_articulo',['edit' =>$edit])

    </div>

    
</x-app-layout>
