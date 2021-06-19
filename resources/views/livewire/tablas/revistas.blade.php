<div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    <input wire:model.debounce.300ms="search" type="text"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Buscar Revista">
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <div>
                        <div class="mt-1">

                        </div>
                    </div>
                </dd>
            </div>
            <div class="sm:col-span-1">

                <dt class="text-sm font-medium text-gray-500">

                </dt>
                <dd class="mt-1 text-sm text-gray-900">

                </dd>

            </div>
        </dl>
    </div>
    <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th wire:click="sortBy('nombre')" style="cursor: pointer;" scope="col"
                                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre de la Revista
                                    @include('partials._sort-icon',['field'=>'titulo'])
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th> --}}
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Clasificación Fondecyt
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Indexaciones
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Publicaciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Odd row -->
                            @foreach ($items as $revista)
                                <tr class="bg-white">
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {!! $revista->full_nameLink() !!}
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$persona}}
                </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($revista->Fondecyt == 1)
                                            {{ $revista->clasificacion_Fondecyt }}
                                        @else
                                            No Clasificada
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {!!$revista->lasIndexacionesLink()!!}
                                    </td>
                                    <td scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{--<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                                        {{$revista->numeroPublicaciones()}}
                                          {{--{{$revista->observaciones}}--}}
                                            
                                        
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Even row -->


                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                  <div class="sm:col-span-1">
      
                   <dt class="text-sm font-medium text-gray-500">
                  {{--      Mostrando {{ $items->firstItem() }} a {{ $items->lastItem() }} de un total de
                        {{ $items->total() }}
                        elementos--}}
                    </dt> 
                      <dd class="mt-1 text-sm text-gray-900">
                          {{ $items->links() }}
      
                      </dd>
      
                  </div>
      
              </div>
            </div>
        </div>

        
    </div>



</div>
