<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Añadir Persona
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
          <form action="{{route('personas.store')}}" method="POST">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Información de Perfil</h2>
                  <p class="mt-1 text-sm text-gray-500">&emsp;</p>
                </div>
    
                <div class="mt-6 grid grid-cols-4 gap-6">
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                    required>
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="last_name" autocomplete="cc-family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email/Correo Electrónico</label>
                    <input type="text" name="email" id="email_address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Rut</label>
                    <input type="text" name="rut" id="expiration_date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="123456789-0">
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
                    <input type="text" name="security_code" id="alias" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-2">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="email_address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="1990-03-29">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">País de Nacionalidad</label>
                    <input type="text" name="nacionalidad" id="expiration_date" autocomplete="cc-exp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="Chile">
                  </div>
    
                  <div class="col-span-4 sm:col-span-1">
                    <label for="security_code" class="flex items-center text-sm font-medium text-gray-700">
                      <span>Teléfono de Contacto</span>
                      <!-- Heroicon name: solid/question-mark-circle -->
                    </label>
                    <input type="number" name="telefono" id="alias" autocomplete="cc-csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="56945994997">
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
                <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                  Save
                </button>
              </div>
            </div>
          </form>
        </section>
        {{--
        <!-- Plan -->
        <section aria-labelledby="plan_heading">
          <form action="#" method="POST">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                  <h2 id="plan_heading" class="text-lg leading-6 font-medium text-gray-900">Plan</h2>
                </div>
    
                <fieldset>
                  <legend class="sr-only">
                    Pricing plans
                  </legend>
                  <div class="relative bg-white rounded-md -space-y-px">
                    <!-- Checked: "bg-orange-50 border-orange-200 z-10", Not Checked: "border-gray-200" -->
                    <label class="border-gray-200 rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3">
                      <div class="flex items-center text-sm">
                        <input type="radio" name="pricing_plan" value="Startup" class="h-4 w-4 text-orange-500 border-gray-300 focus:ring-gray-900" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                        <span id="pricing-plans-0-label" class="ml-3 font-medium text-gray-900">Startup</span>
                      </div>
                      <p id="pricing-plans-0-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                        <!-- Checked: "text-orange-900", Not Checked: "text-gray-900" -->
                        <span class="text-gray-900 font-medium">$29 / mo</span>
                        <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                        <span class="text-gray-500">($290 / yr)</span>
                      </p>
                      <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                      <p id="pricing-plans-0-description-1" class="text-gray-500 ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Up to 5 active job postings</p>
                    </label>
    
                    <!-- Checked: "bg-orange-50 border-orange-200 z-10", Not Checked: "border-gray-200" -->
                    <label class="border-gray-200 relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3">
                      <div class="flex items-center text-sm">
                        <input type="radio" name="pricing_plan" value="Business" class="h-4 w-4 text-orange-500 border-gray-300 focus:ring-gray-900" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                        <span id="pricing-plans-1-label" class="ml-3 font-medium text-gray-900">Business</span>
                      </div>
                      <p id="pricing-plans-1-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                        <!-- Checked: "text-orange-900", Not Checked: "text-gray-900" -->
                        <span class="text-gray-900 font-medium">$99 / mo</span>
                        <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                        <span class="text-gray-500">($990 / yr)</span>
                      </p>
                      <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                      <p id="pricing-plans-1-description-1" class="text-gray-500 ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Up to 25 active job postings</p>
                    </label>
    
                    <!-- Checked: "bg-orange-50 border-orange-200 z-10", Not Checked: "border-gray-200" -->
                    <label class="border-gray-200 rounded-bl-md rounded-br-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3">
                      <div class="flex items-center text-sm">
                        <input type="radio" name="pricing_plan" value="Enterprise" class="h-4 w-4 text-orange-500 border-gray-300 focus:ring-gray-900" aria-labelledby="pricing-plans-2-label" aria-describedby="pricing-plans-2-description-0 pricing-plans-2-description-1">
                        <span id="pricing-plans-2-label" class="ml-3 font-medium text-gray-900">Enterprise</span>
                      </div>
                      <p id="pricing-plans-2-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                        <!-- Checked: "text-orange-900", Not Checked: "text-gray-900" -->
                        <span class="text-gray-900 font-medium">$249 / mo</span>
                        <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                        <span class="text-gray-500">($2490 / yr)</span>
                      </p>
                      <!-- Checked: "text-orange-700", Not Checked: "text-gray-500" -->
                      <p id="pricing-plans-2-description-1" class="text-gray-500 ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Unlimited active job postings</p>
                    </label>
                  </div>
                </fieldset>
    
                <div class="flex items-center">
                  <!-- Enabled: "bg-orange-500", Not Enabled: "bg-gray-200" -->
                  <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors ease-in-out duration-200" role="switch" aria-checked="true" aria-labelledby="annual-billing-label">
                    <span class="sr-only">  setting </span>
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                  </button>
                  <span class="ml-3" id="annual-billing-label">
                    <span class="text-sm font-medium text-gray-900">Annual billing </span>
                    <span class="text-sm text-gray-500">(Save 10%)</span>
                  </span>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                  Save
                </button>
              </div>
            </div>
          </form>
        </section>
    
        <!-- Billing history -->
        <section aria-labelledby="billing_history_heading">
          <div class="bg-white pt-6 shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 sm:px-6">
              <h2 id="billing_history_heading" class="text-lg leading-6 font-medium text-gray-900">Billing history</h2>
            </div>
            <div class="mt-6 flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden border-t border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                          </th>
                          <!--
                            `relative` is added here due to a weird bug in Safari that causes `sr-only` headings to introduce overflow on the body on mobile.
                          -->
                          <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <span class="sr-only">View receipt</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <time datetime="2020-01-01">1/1/2020</time>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Business Plan - Annual Billing
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            CA$109.00
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-orange-600 hover:text-orange-900">View receipt</a>
                          </td>
                        </tr>
    
                        <!-- More payments... -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        --}}
      </div>
    </x-app-layout>