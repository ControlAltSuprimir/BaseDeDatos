<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Base de Datos{{--{{ config('app.name', 'Laravel') }}--}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<div class="h-screen flex overflow-hidden bg-white">
    {{-- <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}


    <div class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
            <div class="flex items-center flex-shrink-0 px-6">
                <a href="/dashboard">
                <img class="h-10 px-3 w-auto" 
                src="/img/logoBaner.png">

                {{--
                <img class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"
                    alt="Workflow">
                    --}}
                </a>
            </div>
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            @livewire('navigation-menu')
        </div>
    </div>
    <!-- Main column -->
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>

</html>
