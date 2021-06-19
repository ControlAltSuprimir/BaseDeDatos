<x-app-layout>

  @livewire('crear.crearcargos')

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Añadir Académico
          </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
          {{--
        <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
          </button>
          --}}
          {{--
          <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            
          </button>
          --}}
        </div>
      </div>
      <form action="{{route('academicos.store')}}" method="POST">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Asigna el Cargo de Académico
                </h2>
                <p class="mt-1 text-sm text-gray-500"></p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
            </div>

            <div class="col-span-4 sm:col-span-1" gap-6>
                <select name="persona" {{-- wire:model="orderProducts.{{ $index }}.product_id" --}}
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                    <option value="">-- Selecciona la Persona --</option>

                    @foreach ($data['allPersonas'] as $persona)
                        <option value="{{ $persona->id }}">
                            {{ $persona->full_name() }}
                            {{-- (${{ number_format($product->price, 2) }}) --}}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>
    <hr>

    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <section aria-labelledby="payment_details_heading">
          
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de Académico</h2>
                  <p class="mt-1 text-sm text-gray-500"></p>
                </div>
    
                <div class="mt-6 grid grid-cols-4 gap-6">
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Inicio de Trabajo</label>
                    <input type="date" name="comienzo" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Término de Trabajo</label>
                    <input type="date" name="termino" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Carrera</label>
                    <input type="text" name="carrera" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Jerarquía</label>
                    <input type="text" name="jerarquia" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Oficina</label>
                    <input type="text" name="oficina" id="email_address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Telefono de Oficina</label>
                    <input type="number" name="telefono" id="expiration_date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="56945994997">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                      <span>Horas Semanales</span>
                      <!-- Heroicon name: solid/question-mark-circle -->
                      
                    </label>
                    <input type="number" name="horas_Semanales" id="alias" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
                  
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  @csrf
                <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                  Guardar Académico
                </button>
              </div>
            </div>
          
        </section>
        
      </div>
    </form>
    </x-app-layout>