<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<x-jet-authentication-card-logo /> 
    </x-slot>--}}
{{--
    <x-jet-validation-errors class="mb-4" />
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-jet-checkbox id="remember_me" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-jet-button class="ml-4">
                {{ __('Log in') }}
            </x-jet-button>
        </div>
    </form>
    </x-jet-authentication-card>
    --}}

    {{-- //////////////////////////////////////////////////////////////////////////////// --}}

    
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    {{--<img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                        alt="Workflow">--}}
                        <img class="h-24 w-auto" src="/img/logoBaner.png"
                        alt="Workflow">
                    {{--
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Conéctate a tu cuenta
                    </h2>
                    --}}
                    <p class="mt-2 text-sm text-gray-600">
                        
                    </p>
                </div>

                <div class="mt-8">
                    <div>

                        <div class="mt-6 relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">
                                    Escribe tus datos
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">

                        <x-jet-validation-errors class="mb-4" />
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{ route('login') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Correo Electrónico
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Contraseña
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>


                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    {{--
                                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                  <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                  </label>
                                  --}}
                                </div>
                  
                                <div class="text-sm">
                                  <a href="/forgot-password" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    ¿Olvidaste tu Contraseña?
                                  </a>
                                </div>
                              </div>



                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixqx=3NB9SH8pma&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                alt="">
        </div>
    </div>

</x-guest-layout>
