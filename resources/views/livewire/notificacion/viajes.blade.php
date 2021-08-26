@if ($number!=0)
    

<a href="/viajespendientes" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">

    <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
    <span class="flex-1">
      Viajes
    </span>
    <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">
      {{ $number }}
    </span>
  </a>

  @endif