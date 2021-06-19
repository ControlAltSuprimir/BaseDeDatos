<x-app-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Crear Indexación
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            
        </div>
    </div>
    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <section aria-labelledby="payment_details_heading">
            <form action="{{ route('indexaciones.store') }}" method="POST">

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">
                                Información Principal</h2>
                            <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that
                                updating your location could affect your tax rates.</p>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-4 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre de la
                                    Indexación</label>
                                <input type="text" name="nombre" id="first_name" autocomplete="cc-given-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                            </div>




                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        @csrf
                        <button type="submit"
                            class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            Agregar Indexación
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>
