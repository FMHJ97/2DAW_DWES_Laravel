<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detalles de Película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-rows-1">
                        <div class="grid grid-cols-2">
                            <div>
                                <img src="{{ $pelicula['poster'] }}" style="height:400px" />
                            </div>
                            <div>
                                <h3 class="text-6xl">{{ $pelicula['title'] }}</h3>
                                <p class="text-2xl mt-3">
                                    <strong>Año:</strong> {{ $pelicula['year'] }} &nbsp;
                                    <strong>Director:</strong> {{ $pelicula['director'] }}
                                </p>
                                <p class="mt-5"><strong>Resumen:</strong> {{ $pelicula['synopsis'] }}</p>
                                @if ($pelicula['rented'])
                                    <p class="mt-5 text-xl"><strong>Estado:</strong> Película actualmente alquilada</p>
                                    <button type="button" class="mt-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Devolver película</button>
                                @else
                                    <p class="mt-5 text-xl"><strong>Estado:</strong> Película disponible</p>
                                    <button type="button" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Alquilar película</button>
                                @endif
                                <a href="{{ url('/catalog/edit') }}">
                                    <button type="button" class="mt-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Editar película</button>
                                </a>
                                <a href="{{ url('/catalog') }}">
                                    <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver al listado</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
