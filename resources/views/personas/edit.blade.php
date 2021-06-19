<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Editar Persona
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
    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <section aria-labelledby="payment_details_heading">
          <form action="{{route('personas.update', $data['persona'])}}" method="POST">
            
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de Perfil</h2>
                  <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
                </div>
    
                <div class="mt-6 grid grid-cols-4 gap-6">
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->primer_nombre}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->segundo_nombre}}">
                  </div>
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->primer_apellido}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->segundo_apellido}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email/Correo Electrónico</label>
                    <input type="text" name="email" id="email_address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->email}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Rut</label>
                    <input type="text" name="rut" id="expiration_date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="123456789-0" value="{{$data['persona']->rut}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                      <span>Alias</span>
                      <!-- Heroicon name: solid/question-mark-circle -->
                      {{--
                      <svg class="ml-1 flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                      </svg>
                      --}}
                    </label>
                    <input type="text" name="security_code" id="alias" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" value="{{$data['persona']->value}}">
                  </div>

                  <div class="col-span-4 sm:col-span-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="email_address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="1990-03-29" value="{{$data['persona']->fecha_nacimiento}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">País de Nacionalidad</label>
                    <input type="text" name="nacionalidad" id="expiration_date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="Chile" value="{{$data['persona']->nacionalidad}}">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                      <span>Teléfono de Contacto</span>
                      <!-- Heroicon name: solid/question-mark-circle -->
                    </label>
                    <input type="number" name="telefono" id="alias" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="56945994997" value="{{$data['persona']->telefono}}">
                  </div>

                  {{--
                  <div class="col-span-4 sm:col-span-2">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                    <select id="country" name="country" autocomplete="country" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                      <option>United States</option>
                      <option>Canada</option>
                      <option>Mexico</option>
                    </select>
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                    <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
                  --}}
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  @csrf
                  @method('PUT')
                <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                  Actualizar
                </button>
              </div>
            </div>
          </form>
        </section>
        <?php $edit=$data['persona']->id;?>
        @livewire('borrar.borrar_persona',['edit' =>$edit])
      </div>
    </x-app-layout>