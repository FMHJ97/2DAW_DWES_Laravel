<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Agregar Película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="#" method="POST">
                        <div class="mb-6">
                            <label for="titulo"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Título</label>
                            <input type="text" id="titulo" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre de la película" required />
                        </div>
                        <div class="mb-6">
                            <label for="anio"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Año</label>
                            <input type="text" id="anio" name="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Año de la película" required />
                        </div>
                        <div class="mb-6">
                            <label for="direct"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Director</label>
                            <input type="text" id="direct" name="director"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Director de la película" required />
                        </div>
                        <div class="mb-6">
                            <label for="cover"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Póster</label>
                            <input type="text" id="cover" name="poster"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="URL del póster de la película" required />
                        </div>
                        <div class="mb-6">
                            <label for="sinopsis"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Resumen</label>
                            <textarea id="sinopsis" rows="4" name="synopsis"
                                class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Resumen de la película..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Agregar
                                película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
