<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Listado de Películas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Mostramos las películas -->
                    <div class="grid grid-cols-4">
                        @foreach ($arrayPeliculas as $key => $pelicula)
                            <div class="p-4">
                                <a href="{{ url('/catalog/show/' . $key) }}">
                                    <img src="{{ $pelicula['poster'] }}" style="height:200px" />
                                    <h4 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                        {{ $pelicula['title'] }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
