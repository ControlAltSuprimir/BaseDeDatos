<x-app-layout>

    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Soporte
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                    Share
                  </button> --}}
            <a href="/personas/create">
                {{-- <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                    Añadir Personas
                </button> --}}
            </a>
        </div>
    </div>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
                <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900">
                            Preguntas Frecuentes
                        </h2>
                        <p class="mt-4 text-lg text-gray-500">
                            ¿No encuentras la respuesta que buscabas? Escríbeme a jaure.diego@gmail.com y conversamos un
                            poco.
                        </p>
                    </div>
                    <div class="mt-12 lg:mt-0 lg:col-span-2">
                        <dl class="space-y-12">
                            <div>
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    No entiendo nada ¿Cómo uso esta plataforma?
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Siempre puedes partir observando nuestros videos tutoriales <a class="text-blue-600" href="https://www.youtube.com/channel/UCOJvoe-P6LgjHcTHL3m24fA" target="_blank">aquí</a>.
                                </dd>
                            </div>

                            <div>
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Hay una funcionalidad que parece muy complicada y no veo ayuda al respecto
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Escríbeme a jaure.diego@gmail.com y veré si puedo añadir un video que te ayude al respecto.
                                </dd>
                            </div>

                            <div>
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Otras personas tienen la capacidad de alterar mi información personal ¿Debo preocuparme?
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Esta plataforma funciona de la misma manera que Wikipedia, es decir, todos los usuarios tienen el poder de modificar la información que desee. Únicamente miembros del departamento tienen la capacidad de usarla de modo que deberían existir acciones maliciosas.
                                </dd>
                            </div>

                            <div>
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Después de hacer click en algo aparece una pantalla extraña hablando de errores y con código.
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Si esto ocurre encontraste un bug de la plataforma. Has un screenshot de esta pantalla y envíamela por correo a jaure.diego@gmail.com, en menos de lo que canta un gallo lo solucionaré.
                                </dd>
                            </div>

                            <!-- More questions... -->
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
